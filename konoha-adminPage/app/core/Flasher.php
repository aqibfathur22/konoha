<?php 

class Flasher {
    public static function setFlash($message, $type) {
        $_SESSION['flash'] = [
            'message' => $message,
            'type' => $type
        ];
    }

    public static function Flash() {
        if(isset($_SESSION['flash'])) { 
            $flash = $_SESSION['flash'];
            echo "
            <script>
                Swal.fire({
                    title: '".htmlspecialchars($flash['message'], ENT_QUOTES)."',
                    icon: '".htmlspecialchars($flash['type'], ENT_QUOTES)."',
                    confirmButtonText: 'Selesai',
                    confirmButtonColor: '#0084d1',
                });
            </script>
            ";
            unset($_SESSION['flash']);
        }
    }
}

?>      
