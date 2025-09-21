<?php
class BoletoItau extends BoletoAbstrato implements BoletoComJuros {

    public function aplicarJuros(float $taxa): void {
        if ($taxa < 0) {
            throw new InvalidArgumentException("Taxa de juros não pode ser negativa");
        }
        $juros = $this->valor * ($taxa / 100);
        $this->valor += $juros;
    }

    public function gerarCodigoBarras(): string {
        // Exemplo: formatar valor com 2 casas decimais e concatenar com data
        $valorSemSeparadores = str_replace('.', '', str_replace(',', '', number_format($this->valor, 2, ',', '')));
        $dataFormatada = date('Ymd', strtotime($this->dataVencimento));
        return "002{$valorSemSeparadores}{$dataFormatada}"; // Código específico do Itaú
    }

    public function validar(): bool {
        // Regra do Itaú: valor > 0 e data futura
        if ($this->valor <= 0) {
            return false;
        }
        $dataVencimento = new DateTime($this->dataVencimento);
        $hoje = new DateTime();
        return $dataVencimento > $hoje;
    }

    protected function renderizarHtml(): string {
        return "<div>Boleto Itaú - R$ {$this->valor} - Venc: {$this->dataVencimento}</div>";
    }

    protected function renderizarPdf(): string {
        return "[PDF] Boleto Itaú - R$ {$this->valor} - Venc: {$this->dataVencimento}";
    }
}