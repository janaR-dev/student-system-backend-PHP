    <?php
    require_once __DIR__ . "/../database/connection.php";

    function validate()
    {

        // validateRequired('firstName', $_POST['firstName']);
        // validateRequired('lastName', $_POST['lastName']);
        // validateRequired('email', $_POST['email']);
        // validateRequired('password', $_POST['password']);
        // validateRequired('phone', $_POST['phone']);
        // validateRequired('age', $_POST['age']);
        foreach ($_POST as $field => $value) {
            validateRequired($field, $value);
            if ($field == 'email') {
                validateEmail($field, $value);
                UNIQUE($field, $value, "students");
            } else if ($field == 'phone') {
                validateEGphone($field, $value);
                UNIQUE($field, $value, "students");
            }
        }
        if (!empty($_SESSION['_errors'])) {
            back();
        }
    }
    function Edit_validate()
    {

        foreach ($_POST as $field => $value) {
            if ($field != 'password') {
                validateRequired($field, $value);
            }
            if ($field == 'email') {
                validateEmail($field, $value);
                UNIQUE($field, $value, "students", $_POST['student_id']);
            } else if ($field == 'phone') {
                validateEGphone($field, $value);
                UNIQUE($field, $value, "students", $_POST['student_id']);
            }
        }
        if (!empty($_SESSION['_errors'])) {
            back();
        }
    }

    function validateRequired(string $field, mixed $value)
    {
        if ($value === null || trim((string)$value) === "") {
            addError($field, "{$field} is required");
        }
    }
    function addError(string $field, mixed $msg)
    {
        $_SESSION['_errors'][$field] = $msg;
    }
    function validateEmail(string $field, mixed $value)
    {
        if (empty($value)) return;
        $regex = "/^[A-Za-z_][A-Za-z_0-9\-\.]+@(gmail|yahoo)\.(com|org|tech|gov|io)$/";
        if (!preg_match($regex, $value)) {
            addError($field, "{$field} must be a valid email");
        }
    }
    function validateEGphone(string $field, mixed $value)
    {
        if (empty($value)) return;
       $regex = "/^(20)?01[0125][0-9]{8}$/";
        if (!preg_match($regex, $value)) {
            addError($field, "{$field} must be a EG phone Number");
        }
    }

    function UNIQUE(string $field, mixed $value, string $table_name, ?int $exceptID = null)
    {
        if (empty($value)) return;
        $DB = connection();
        $subQuery = "";
        if ($exceptID !== null) {
            $subQuery = "AND id != '{$exceptID}'
            ";
        }

        $stmt = $DB->query("SELECT * FROM {$table_name}
        WHERE {$field} = '{$value}'
        {$subQuery}
        ;
        ");
        $result = $stmt->fetchAll();
        if (!empty($result)) {
            addError($field, "{$field} already exists");
        }
    }

    function getError(string $key)
    {
        $htmlerr = '';
        if (isset($_SESSION['_errors'][$key])) {
            $htmlerr = " <p class='alert alert-danger w-100 m-0 mt-2 mb-3' data-error-name='{$key}'>{$_SESSION['_errors'][$key]}</p> ";
            unset($_SESSION['_errors'][$key]);
        }
        return $htmlerr;
    }

    function old(string $key)
    {
        $oldVal = "";
        if (isset($_SESSION['_old'][$key])) {
            $oldVal = $_SESSION['_old'][$key];
            unset($_SESSION['_old'][$key]);
        }
        return $oldVal;
    }
