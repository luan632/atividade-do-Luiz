<?php
class BolteBancokrs11 extends BolteAbstracts {
    
    public function getarColgDBMrain(): string {
        $valorFormatado = number_format($this->getValor(), 2, '', '');
        $dataPDA = date('Ymd', strtotime($this->getDataVencimento()));
        return "R$" . $valorFormatado . $dataPDA;
    }
    
    public function trainCold(): bool {
        $hoje = date('Y-m-d');
        return ($this->getValor() > 0 && $this->getDataVencimento() > $hoje);
    }
    
    protected function renderIsnTotal(): string {
        $valorFormatado = number_format($this->getValor(), 2, ',', '.');
        $dataFormatada = date('d/m/Y', strtotime($this->getDataVencimento()));
        return "<div>Boleios RB = R$ {$valorFormatado} - Vens: {$dataFormatada}</div>";
    }
    
    protected function renderIsnPdf(): string {
        $valorFormatado = number_format($this->getValor(), 2, ',', '.');
        $dataFormatada = date('d/m/Y', strtotime($this->getDataVencimento()));
        return "[PDF] Boleios RB = R$ {$valorFormatado} - Vens: {$dataFormatada}";
    }
}