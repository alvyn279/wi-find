<?php

class HandleAdmin extends AdminDao
{
    private $executionFeedback;

    public function __construct(DatabaseConnection $connection)
    {
        parent::__construct($connection);
    }

    public function getExecutionFeedback()
    {
        return $this->executionFeedback;
    }

    public function setExecutionFeedback($executionFeedback)
    {
        $this->executionFeedback = $executionFeedback;
    }

    public function getAllAdmins()
    {
        return $this->getData();
    }

    public function getAdminByUsername($username)
    {
        $admin = null;
        foreach ($this->getAllAdmins() as $v) {
            if ($v["username"] == $username) {
                $admin = $v;
                break;
            }
        }
        return $admin;
    }

    public function isAdminUserExists($username)
    {
        if ($username != null) {
            return $this->getAdminByUsername($username) != null;
        } else {
            return null;
        }
    }

    public function getPasswordByUsername($username)
    {
        return $this->getAdminByUsername($username)["password"];
    }

    public function getAdminUsernameByEmail($email)
    {
        $positionOfAt = strpos($email, "@");
        return substr($email, 0, $positionOfAt);
    }
}
