<?php
class Nilai {
    private $assessment;
    private $ats;
    private $aas;

    public function __construct($assessment, $ats, $aas) {
        $this->assessment = $assessment;
        $this->ats = $ats;
        $this->aas = $aas;
    }

    public function hitungTotal() {
        return $this->assessment + $this->ats + $this->aas;
    }

    public function hitungRataRata() {
        return $this->hitungTotal() / 3;
    }

    public function hitungNilaiMaksimal() {
        return max($this->assessment, $this->ats, $this->aas);
    }

    public function hitungNilaiMinimal() {
        return min($this->assessment, $this->ats, $this->aas);
    }

    public function kategoriAssessment() {
        if ($this->assessment >= 1 && $this->assessment <= 74) {
            return 'Tidak Kompeten';
        } elseif ($this->assessment == 75) {
            return 'Pas KKM';
        } elseif ($this->assessment >= 76 && $this->assessment <= 100) {
            return 'Kompeten';
        } else {
            return 'Tidak Terdeteksi';
        }
    }

    public function kategoriATS() {
        if ($this->ats >= 1 && $this->ats <= 74) {
            return 'Tidak Kompeten';
        } elseif ($this->ats == 75) {
            return 'Pas KKM';
        } elseif ($this->ats >= 76 && $this->ats <= 100) {
            return 'Kompeten';
        } else {
            return 'Tidak Terdeteksi';
        }
    }

    public function kategoriAAS() {
        if ($this->aas >= 1 && $this->aas <= 74) {
            return 'Tidak Kompeten';
        } elseif ($this->aas == 75) {
            return 'Pas KKM';
        } elseif ($this->aas >= 76 && $this->aas <= 100) {
            return 'Kompeten';
        } else {
            return 'Tidak Terdeteksi';
        }
    }
}