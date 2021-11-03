<?php 
    abstract class karyawan {
        private $name, $ttl, $gender, $level, $status, $gaji;

        public function __construct ($name, $ttl, $gender, $level, $status) {
            $this->name = $name;
            $this->ttl = $ttl;
            $this->gender = $gender;
            $this->level = $level;
            $this->status = $status;
        }

        public function getStatus () {
            return $this->status;
        }

        public function getGaji () {
            return $this->gaji;
        }

        public function setGaji ($gaji) {
            $this->gaji = $gaji;
        }

        public function filterLevel () {
            foreach ($this as $key) {
                if ($this->level === "Junior") {
                    $this->setGaji(2000000);
                } elseif ($this->level === "Amateur") {
                    $this->setGaji(3500000);
                } elseif ($this->level === "Senior") {
                    $this->setGaji(5000000);
                }
            }
        }

        abstract protected function filterStatus ();

        public function setArray () {
            foreach ($this as $key) {
                $data[] = $key;
            }
            return $data;
        }
    }

    class tabel extends karyawan {
        public function filterStatus () {
            $status = $this->getStatus();
            $gaji = $this->getGaji();
            if ($status === "Fullitime") {
                $gaji = $gaji;
            } elseif ($status === "Parttime") {
                $gaji = ($gaji/2);
            }   
            return $this->setGaji($gaji);
        }
    }

    $karyawan1 = new tabel ("Hanif Irvin", "Bali, 01-01-2001", "Pria", "Junior", "Fulltime");
    $karyawan1->filterLevel(); $karyawan1->filterStatus();
    $data[] = $karyawan1->setArray();
    $karyawan2 = new tabel ("Hantu Belau", "Jambi, 10-12-2001", "Pria", "Amateur", "Parttime");
    $karyawan2->filterLevel(); $karyawan2->filterStatus(); 
    $data[] = $karyawan2->setArray();
    $karyawan3 = new tabel ("Budi Sutejo", "Jakarta, 05-02-2001", "Pria", "Senior", "Fulltime");
    $karyawan3->filterLevel(); $karyawan3->filterStatus();
    $data[] = $karyawan3->setArray();
    $karyawan4 = new tabel ("Mitsu Oreo", "Depok, 20-09-2003", "Wanita", "Senior", "Parttime");
    $karyawan4->filterLevel(); $karyawan4->filterStatus();
    $data[] = $karyawan4->setArray();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Data Karyawan</title>
</head>
<body>
    <div class="jumbotron">
        <h1>Data Karyawan Perusahaan Joy</h1>
    </div>

    <div class="container">
    <input type="text" id="search" placeholder="masukkan keyword">
    <button for="search">search!</button>
    <h2>Tabel Data Karyawan</h2>
    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Tempat, Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Level Karyawan</th>
            <th>Status</th>
            <th>Gaji Karyawan</th>
        </thead>
        <tbody>
            <?php for ($num = 0; $num < 4; $num++) : ?>
            <tr>
                <th scope="row"> <?= $num+1; ?> </th>
                <?php for ($i = 0; $i < 6; $i++) : ?>
                <td> <?= $data[$num][$i]; ?> </td>    
                <?php endfor; ?>
            </tr>
            <?php endfor; ?>
        </tbody>
    </table>
    </div>
</body>
</html>