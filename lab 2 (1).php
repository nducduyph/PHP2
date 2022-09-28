<?php

interface PhepTinh {
    public function Cong();
    public function Tru();
    public function Nhan();
    public function Chia();
}
class TinhToan implements PhepTinh {
    private $a;
    private $b;

    public function __construct($a, $b) {
        $this->a = $a;
        $this->b = $b;
    }

    function Cong() {
        return $this->a + $this->b;
    }

    function Tru() {
        return $this->a - $this->b;
    }

    function Nhan() {
        return $this->a * $this->b;
    }

    function Chia() {
        if (!$this->b == 0) {
            return $this->a + $this->b;
        } else {
            return 'Không thực hiện được phép tính';
        }
    }
}

$demo = new TinhToan(2, 33);

echo '<pre>';
var_dump($demo->Cong());
var_dump($demo->Tru());
var_dump($demo->Nhan());
var_dump($demo->Chia());

?>
