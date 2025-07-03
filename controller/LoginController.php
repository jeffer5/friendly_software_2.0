<?php
require_once 'model/UsuarioModel.php';

require_once 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class LoginController{
    private $Login;

    public function __construct() {
        // Crear una instancia del modelo Usuario
        $this->Login = new UsuarioModel(); //Esto nos permite usar los métodos de Usuario dentro de este controlador.
    }



    public function login()
{
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usu_usu = $_POST['usu_usu'] ?? '';
        $pass_usu = $_POST['pass_usu'] ?? '';

        // Validar que los campos no estén vacíos
        if (empty($usu_usu) || empty($pass_usu)) {
            $error = 'Por favor, ingrese usuario y contraseña.';
            require 'views/login.php';
            return;
        }

        // Instanciar el modelo y buscar el usuario
        $usuarioModel = new UsuarioModel(); // Asegúrate de que la clase Usuario esté correctamente incluida
        $user = $usuarioModel->findUsu($usu_usu, $pass_usu);

        if ($user) {
            // Usuario autenticado, iniciar sesión
            $_SESSION['user'] = $user; //trae por medio del sesio a ['user'] el cual contiene los datos de mi consulta en UsuarioModel

           switch ($user['rol_usu']) { //compara $user con el rol correspondiente en la tabla
            case 'supervisor':
                header('Location: index.php?action=supervisor_dashboard');
                break;
            case 'operario':
                header('Location: index.php?action=operario_dashboard');
                break;
            default:
                header('Location: index.php?action=home');
                break;
        }
        exit();



           
        } else {
            // Credenciales inválidas
            $error = 'Usuario o contraseña incorrectos.';
            require 'views/login.php';
            return;
        }
    }

    // Mostrar el formulario de login si no se ha enviado el formulario
    require 'views/login.php';
}
       


    public function showForgotPasswordForm() {
        // Simplemente carga la vista del formulario
        require_once 'views/forgot_password.php';
    }



public function sendResetLink() {
        // Asegúrate de iniciar la sesión si la usas para mensajes
        // y no la has iniciado globalmente en index.php
        // session_start(); 

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? ''; // Usar null coalescing operator por seguridad

            // 1. Busca el usuario en la base de datos
            $user = $this->Login->findUserByEmail($email);

            // Mensaje genérico por seguridad, para evitar enumeración de emails
            $message_to_user = "Si la dirección de correo electrónico existe en nuestro sistema, te hemos enviado un enlace para restablecer tu contraseña.";

            if ($user) {
                // 2. Si el usuario existe, genera y guarda el token
                $token = bin2hex(random_bytes(32)); 
                
                // Almacena el token en la base de datos
                $this->Login->createPasswordResetToken($email, $token);

                // 3. Prepara el enlace de restablecimiento
                // Ajusta esta URL base a la URL real de tu aplicación.
                // Si tu archivo de enrutamiento (index.php) está en la raíz de tu dominio (ej. friendlyapp.com),
                // la URL puede ser algo como "/reset-password?token="
                // Si estás en un subdirectorio (ej. localhost/friendly_software_2.0/),
                // la URL sería "/friendly_software_2.0/reset-password?token="
                // Detecta la base de la URL automáticamente (asumiendo que tu index.php está en friendly_software_2.0)
                // Esto generaría algo como "http://localhost/friendly_software_2.0"
                $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
                $host = $_SERVER['HTTP_HOST'];
                $script_name = $_SERVER['SCRIPT_NAME']; // Ej. /friendly_software_2.0/index.php
                // Esto obtiene la parte del path sin el nombre del script final,
                // asegurando que sea '/friendly_software_2.0'
                $base_path = rtrim(dirname($script_name), '/\\'); 

                // La URL completa del enlace de restablecimiento
                // Será algo como: http://localhost/friendly_software_2.0/reset-password?token=XYZ
                $reset_link = $protocol . $host . $base_path . "/index.php?action=showResetForm&token=" . urlencode($token);


                // 4. Configura y envía el correo electrónico con PHPMailer
                $mail = new PHPMailer(true); // Pasar `true` habilita las excepciones para un mejor manejo de errores

                try {
                    // Configuración del servidor SMTP (¡Aquí debes poner los datos de tu proveedor de correo!)
                    $mail->isSMTP();                                            // Enviar usando SMTP
                    $mail->Host       = 'smtp.gmail.com';                  // Reemplaza con el host SMTP de tu proveedor (ej. smtp.gmail.com, smtp-mail.outlook.com)
                    $mail->SMTPAuth   = true;                                   // Habilitar autenticación SMTP
                    $mail->Username   = 'jefferaonavila010@gmail.com';            // Reemplaza con tu dirección de correo
                    $mail->Password   = 'kkkh rbow etog srsy';                  // Reemplaza con tu contraseña de correo (o contraseña de aplicación si usas Gmail/Outlook)
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Habilitar cifrado TLS implícito (SSL/TLS)
                    $mail->Port       = 465;                                    // Puerto TCP para conectar; 465 para SMTPS, 587 para STARTTLS

                    // Destinatarios
                    $mail->setFrom('jefferaonavila010@gmail.com', 'FriendlyApp'); // De quién se envía el correo
                    $mail->addAddress($user['ema_usu'], $user['nom_usu']);     // A quién se envía el correo (email y nombre del usuario)

                    // Contenido del correo
                    $mail->isHTML(true);                                        // Establecer formato de correo a HTML
                    $mail->Subject = 'Restablece tu contraseña para FriendlyApp';
                    $mail->Body    = '
                        <html>
                        <head>
                            <title>Restablece tu contraseña</title>
                        </head>
                        <body>
                            <h2>Hola ' . htmlspecialchars($user['nom_usu']) . ',</h2>
                            <p>Hemos recibido una solicitud para restablecer la contraseña de tu cuenta en FriendlyApp.</p>
                            <p>Haz clic en el siguiente enlace para establecer una nueva contraseña:</p>
                            <p><a href="' . htmlspecialchars($reset_link) . '">Restablecer mi contraseña</a></p>
                            <p>Este enlace expirará en 1 hora. Si no solicitaste este restablecimiento, por favor ignora este correo.</p>
                            <p>Gracias,<br>El equipo de FriendlyApp</p>
                        </body>
                        </html>
                    ';
                    $mail->AltBody = 'Para restablecer tu contraseña, copia y pega este enlace en tu navegador: ' . $reset_link; // Texto plano para clientes sin HTML

                    $mail->send();
                    // Si el correo se envió con éxito, el mensaje al usuario ya se estableció arriba
                } catch (Exception $e) {
                    // Si hay un error en el envío del correo
                    // Log del error para depuración (no se lo muestres al usuario final)
                    error_log("Error al enviar correo de restablecimiento a {$email}: {$mail->ErrorInfo}"); 
                    // El mensaje genérico al usuario ya está definido, para no revelar si el email existe
                }
            }
            
            // Carga la vista con el mensaje de confirmación (ya sea que el correo se haya enviado o no)
            // Aseguramos que la vista 'forgot_password.php' tenga la variable $message disponible
            $message = $message_to_user;
            require_once 'views/forgot_password.php';
            exit(); // Es importante usar exit() después de un require para una vista final
        }
        // Si no es una petición POST, simplemente muestra el formulario
        require_once 'views/forgot_password.php';
    }
    


      public function showResetForm() {
        $token = $_GET['token'] ?? '';
        $reset_token = $this->Login->findToken($token);

        if ($reset_token && strtotime($reset_token['expires_at']) > time()) {
            require_once 'views/reset_password.php';
        } else {
            $error = "El enlace para restablecer la contraseña no es válido o ha expirado. Por favor, solicita uno nuevo.";
            require_once 'views/forgot_password.php';
        }
    }





    public function updatePassword() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $token = $_POST['token'];
            $new_password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            $reset_token = $this->Login->findToken($token);

            if ($reset_token && strtotime($reset_token['expires_at']) > time()) {
                if ($new_password !== $confirm_password) {
                    $error = "Las contraseñas no coinciden.";
                    // Aquí deberías pasar el token a la vista para que el formulario lo tenga
                    // y el usuario no pierda el contexto
                    $token = htmlspecialchars($token); // Pasa el token para que el formulario lo use
                    require_once 'views/reset_password.php';
                    return;
                }

                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $this->Login->updatePassword($reset_token['email'], $hashed_password);
                $this->Login->deleteToken($token);

                session_start();
                $_SESSION['mensaje'] = '¡Tu contraseña ha sido restablecida con éxito! Ya puedes iniciar sesión.';
                header('Location: index.php?action=home');
                exit;
            } else {
                $error = "El enlace no es válido o ha expirado. Por favor, solicita uno nuevo.";
                require_once 'views/forgot_password.php';
            }
        }
    }

}