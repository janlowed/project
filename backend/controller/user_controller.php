<?php
include '../database/db.php';
class UserController extends Database
{
    public function registered($register)
    {
        $arr = ['username', 'email', 'password'];

        foreach($arr as $item)
        {
            if(empty($register[$item]))
            {
                return json_encode([
                    'message' => "$item is required"
                ]);    
            }
}

$username = $register['username'] ?? '';
$email = $register['email'] ?? '';
$password = $register['password'] ?? '';

$email2 = $this->conn->prepare('SELECT * FROM user where email = ?');
$email2->bind_param('s', $email);
$email2->execute();
$isEmail = $email2->get_result();

if($isEmail->num_rows > 0)
{
    return json_encode([
        'message' => 'Email has already been used'
    ]);
}

$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
$stmt = $this->conn->prepare("INSERT INTO user(username, email, password) VALUES(?,?,?)");
$stmt->bind_param('sss', $username, $email, $hashedPassword);
$isRegister = $stmt->execute();

if($isRegister)
{
    return json_encode([
        'message' => 'Registered Successfully'
]);
        }else{
            return json_encode([
                'message' => 'Registration failed'
            ]);
        }

    }

    public function login($login)
    {
        if(empty($login['email']) || empty($login['password']))
        {
            return json_encode([
                'message' => 'Please fill in all fields'
            ]);
        }
    
        $email = $login['email'] ?? '';
        $password = $login['password'] ?? '';
        
        $stmt = $this->conn->prepare('SELECT * FROM user where email = ?');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($result && $result->num_rows > 0)
        {
            $user = $result->fetch_assoc();
            $hashedPassword = $user['password'];

if(password_verify($password, $hashedPassword))
            {
                return json_encode([
                    'message' => 'Login successful'
                ]);
            }else{
                return json_encode([
                    'message' => 'Login failed'
                ]);
            }
        }else{
            return json_encode([
                'message' => 'Invalid Email or Password'
            ]);
        }
    }

    public function getAll()
    {
        $data = $this->conn->query('SELECT * FROM user');
        if($data->num_rows > 0)
        {
            $result = $data->fetch_all(MYSQLI_ASSOC);
            return $result;
        }
    }
}

?>