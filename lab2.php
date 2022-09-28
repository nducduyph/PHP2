<?php
class ConNguoi {
    protected $ten;
    protected $gioiTinh;
    protected $ngaySinh;
    protected $canNang;
    protected $chieuCao;

    function __construct($ten, $gioiTinh, $ngaySinh, $canNang, $chieuCao)
    {
        $this->ten = $ten;
        $this->gioiTinh = $gioiTinh;
        $this->ngaySinh = $ngaySinh;
        $this->canNang = $canNang;
        $this->chieuCao = $chieuCao;
    }
}

class MonThiDau {
    public $tenMon;
    public $dieuKienChieuCao;
    public $dieuKienCanNang;
    public function __construct($tenMon, $dieuKienChieuCao, $dieuKienCanNang)
    {
        $this->tenMon = $tenMon;
        $this->dieuKienCanNang = $dieuKienCanNang;
        $this->dieuKienChieuCao  = $dieuKienChieuCao;
    }
}

class VanDongVien extends ConNguoi {
    protected $soHuyChuong;
    protected $cacMonDaThiDau;
    public function __construct($ten, $gioiTinh, $ngaySinh, $canNang, $chieuCao, $soHuyChuong, $cacMonDaThiDau) {
        parent::__construct($ten, $gioiTinh, $ngaySinh, $canNang, $chieuCao);
        $this->chieuCao = $chieuCao;
        $this->soHuyChuong = $soHuyChuong;
        $this->cacMonDaThiDau = $cacMonDaThiDau;
    }
    public function  hienThiThongTin() {
        $monDaThiDau = implode(" ,", $this->cacMonDaThiDau);
        if ($this->gioiTinh == 1) {
            $this->gioiTinh = 'Nam';
        } else {
            $this->gioiTinh = 'Nữ';
        }
        return "
            Tên vận động viên: $this->ten,   <br>
            Giới tính: $this->gioiTinh,  <br>
            Ngày sinh: $this->ngaySinh,  <br>
            Cân nặng: $this->canNang,  <br>
            Chiều cao: $this->chieuCao,  <br>
            Số huy chương: $this->soHuyChuong, <br>
            Các môn thi đấu: $monDaThiDau
        ";
    }
    public function thiDau($monThiDau, $soHuyChuong) {
        if ($this->chieuCao < $monThiDau->dieuKienChieuCao || $this->canNang < $monThiDau->dieuKienCanNang) {
            $totalMedal = $this->soHuyChuong -= $soHuyChuong;
            if ($totalMedal < 0) {
                $totalMedal = 0;
            }
        }
        return "
        Số huy chương: $totalMedal
        ";
    }
}

echo '<pre>';
$monThiDau = new MonThiDau('abc', 123, 1248);
$vandongvien = new VanDongVien('a', 2, '2022/09/26', 2, 123, 123, ['a', 'b']);
echo '<h1>Thông tin vận động viên:</h1>';
echo $vandongvien->hienThiThongTin();
echo '<h1>Số huy chương:</h1>';
echo $vandongvien->thiDau($monThiDau, 10);
echo '</pre>';

?>