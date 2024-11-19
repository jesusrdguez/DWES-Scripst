<?php

class Usuario
{

    private string $name;
    private string $email;
    private string $password;

    public function __construct(string $name, string $email, string $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function getNombre(): string
    {
        return $this->name;
    }

}

?>