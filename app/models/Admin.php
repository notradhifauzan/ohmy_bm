<?php
class Admin
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function testFetchPdf($topicId)
    {
        $this->db->query('SELECT * FROM topic WHERE topicId = :topicId');
        $this->db->bind(':topicId', $topicId);
        $result = $this->db->single();

        if ($result) {
            $data = [
                'pdfContent' => $result->pdf_content,
                'pdfName' => $result->topicName
            ];

            return $data;
        } else {
            return false;
        }
    }

    public function addTopic($data)
    {
        $this->db->query('INSERT INTO topic (topicName, darjahId, pdf_content, summary) VALUES (:topicName, :darjahId, :pdf_content, :summary)');
        $this->db->bind(':topicName', $data['topicName']);
        $this->db->bind(':darjahId', $data['darjahId']);
        $this->db->bind(':summary', $data['summary']);
        $this->db->bind(':pdf_content', $data['pdf_content'], PDO::PARAM_LOB);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteMaterials($topicId)
    {
        $this->db->query('delete from topic where topicId=:topicId;');
        $this->db->bind(':topicId',$topicId);
        $this->db->execute();
    }

    public function testStorePdf($topicName, $fileContent)
    {
        $this->db->query('INSERT INTO topic (topicName, pdf_content, darjahId) VALUES (:topicName, :fileContent, :darjahId)');
        $this->db->bind(':topicName', $topicName);
        $this->db->bind(':darjahId', 1);
        $this->db->bind(':fileContent', $fileContent,  PDO::PARAM_LOB);

        $this->db->execute();

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getDarjahDetails($darjahId)
    {
        $this->db->query('select * from darjah where darjahId=:darjahId;');
        $this->db->bind(':darjahId', $darjahId);
        $this->db->execute();

        return $this->db->single();
    }

    public function deleteSOW($darjahId)
    {
        $this->db->query('update darjah set pdf_name=:pdf_name, pdf_notes=:pdf_content where darjahId=:darjahId;');
        $this->db->bind(':pdf_name',null);
        $this->db->bind(':pdf_content',null);
        $this->db->bind(':darjahId',$darjahId);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function uploadSOW($data)
    {
        $this->db->query('update darjah set pdf_name=:pdf_name, pdf_notes=:pdf_content where darjahId=:darjahId;');
        $this->db->bind(':pdf_name', $data['fileName']);
        $this->db->bind(':pdf_content', $data['fileContent']);
        $this->db->bind(':darjahId', $data['darjahId']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function topicList($darjahId)
    {
        $this->db->query('select * from topic where darjahId=:darjahId;');
        $this->db->bind(':darjahId', $darjahId);
        $this->db->execute();

        return $this->db->resultSet();
    }

    //Login Admin
    public function login($username, $password)
    {
        //finding the user with that username
        $this->db->query('SELECT * FROM admin WHERE username=:username;');
        $this->db->bind(':username', $username);

        //single method will return the whole row as object
        //so you can treat $row as an object, and access the password

        $row = $this->db->single();

        if ($row->password == $password) {
            return $row;
        } else {
            return false;
        }
    }

    public function findAdminById($adminid)
    {
        $this->db->query('select * from admin where id=:id;');
        $this->db->bind(':id', $adminid);
        $this->db->execute();

        return $this->db->single();
    }

    public function findAdminByUsername($username)
    {
        $this->db->query('select * from admin where username =:username;');
        $this->db->bind(':username', $username);
        $this->db->execute();

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAdminDetails($username)
    {
        $this->db->query('select * from admin where username = :username');
        $this->db->bind(':username', $username);
        $this->db->execute();
        return $this->db->single();
    }

    public function getAllAdmin()
    {
        $this->db->query('select * from admin');
        $this->db->execute();
        return $this->db->resultSet();
    }
}
