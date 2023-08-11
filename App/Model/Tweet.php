<?php
namespace App\Model;

use Core\Database;
use Core\Model;

class Tweet extends Model
{
    public $content;

    public $user_id;

    public function __construct(string $content, int $user_id = null)
    {
        parent::__construct();
        $this->table = 'tweets';
        $this->content = $content;
        $this->user_id = $user_id ?? auth('id');
    }

    public function create()
    {
        $values = ['user_id' => $this->user_id, 'content' => $this->content];
        return $this->db->insert($this->table, $values);
    }
}