<?php 
session_start();

if (isset($_POST['uname']) &&
    isset($_POST['pass'])) {

	include "../DB_connection.php";

	$uname = $_POST['uname'];
	$pass = $_POST['pass'];

	if (empty($uname)) {
		$em  = "Username is required";
		header("Location: ../login.php?error=$em");
		exit;
	}else if (empty($pass)) {
		$em  = "Password is required";
		header("Location: ../login.php?error=$em");
		exit;
	}else {
        // Auto-detect role by checking tables in order
        $tables = [
            'admin' => ['table' => 'admin', 'role' => 'Admin', 'id_field' => 'admin_id'],
            'teachers' => ['table' => 'teachers', 'role' => 'Teacher', 'id_field' => 'teacher_id'],
            'students' => ['table' => 'students', 'role' => 'Student', 'id_field' => 'student_id'],
            'registrar_office' => ['table' => 'registrar_office', 'role' => 'Registrar Office', 'id_field' => 'r_user_id']
        ];

        $user = null;
        $role = null;
        $id_field = null;

        foreach ($tables as $key => $table_info) {
            $sql = "SELECT * FROM " . $table_info['table'] . " WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$uname]);

            if ($stmt->rowCount() == 1) {
                $user = $stmt->fetch();
                $role = $table_info['role'];
                $id_field = $table_info['id_field'];
                break;
            }
        }

        if ($user) {
        	$username = $user['username'];
        	$password = $user['password'];

            if ($username === $uname) {
            	if (password_verify($pass, $password)) {
            		$_SESSION['role'] = $role;
            		if ($role == 'Admin') {
                        $id = $user[$id_field];
                        $_SESSION['admin_id'] = $id;
                        header("Location: ../admin/index.php");
                        exit;
                    }else if ($role == 'Student') {
                        $id = $user[$id_field];
                        $_SESSION['student_id'] = $id;
                        header("Location: ../Student/index.php");
                        exit;
                    }else if ($role == 'Registrar Office') {
                        $id = $user[$id_field];
                        $_SESSION['r_user_id'] = $id;
                        header("Location: ../RegistrarOffice/index.php");
                        exit;
                    }else if($role == 'Teacher'){
                    	$id = $user[$id_field];
                        $_SESSION['teacher_id'] = $id;
                        header("Location: ../Teacher/index.php");
                        exit;
                    }else {
                    	$em  = "Incorrect Username or Password";
				        header("Location: ../login.php?error=$em");
				        exit;
                    }

            	}else {
		        	$em  = "Incorrect Username or Password";
				    header("Location: ../login.php?error=$em");
				    exit;
		        }
            }else {
	        	$em  = "Incorrect Username or Password";
			    header("Location: ../login.php?error=$em");
			    exit;
	        }
        }else {
        	$em  = "Incorrect Username or Password";
		    header("Location: ../login.php?error=$em");
		    exit;
        }
	}


}else{
	header("Location: ../login.php");
	exit;
}