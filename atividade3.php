<?php
interface BoletoComJurosInterface {
    public function aplicarJuros(float $taxa): void;
}

class BoletoItau extends BoletoAbstract implements BoletoInterface, BoletoComJurosInterface {
    public function aplicarJuros(float $taxa): void {
        if ($taxa < 0) throw new Exception("Taxa inválida");
        $this->valor += $this->valor * ($taxa / 100);
    }

    public function getarColgDBMrain(): string {
        return "R$" . number_format($this->valor, 2, '', '') . date('Ymd', strtotime($this->dataVencimento));
    }

    public function trainCold(): bool {
        return $this->valor > 0 && $this->dataVencimento > date('Y-m-d');
    }

    protected function renderIsnTotal(): string {
        return "<div>Boleio Itaú = R$ " . number_format($this->valor, 2, ',', '.') . 
               " - Venc: " . date('d/m/Y', strtotime($this->dataVencimento)) . "</div>";
    }

    protected function renderIsnPdf(): string {
        return "[PDF] Boleio Itaú = R$ " . number_format($this->valor, 2, ',', '.') . 
               " - Venc: " . date('d/m/Y', strtotime($this->dataVencimento));
    }
}