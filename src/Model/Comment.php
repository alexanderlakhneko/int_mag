<?php

namespace Model;

use Library\EntityRepository;
use Library\Request;
use Library\Session;

class Comment extends EntityRepository
{
    public function getComments($id_news)
    {
        $sql = "SELECT u.name, c.* FROM comments c
        LEFT JOIN `user` u ON u.id=c.id_user
        WHERE id_product='{$id_news}' AND c.is_active=1 ORDER BY date_time DESC";
        $result = $this->pdo->query($sql);
        $i = 0;
        foreach ($result as $key => $value) {
                $results[$value['id_comment']] = $value;
            $i++;
        }
        $results['count'] = $i;
        return $results;
    }

    public function addComment($id_user, $id_product, $comment, $is_active = 1)
    {
        $sql_user = "SELECT id,`name` FROM user WHERE `name` LIKE '%{$id_user}%'";
        $comment = htmlspecialchars($this->pdo->quote($comment));
        $result = $this->pdo->query($sql_user);
        $row = $result->fetch();
        if (isset($ror)) {
            $id_user = $row['id'];
        }

        $sql = "
            INSERT INTO comments
            SET id_user='{$id_user}',
                id_product='{$id_product}',
                comment={$comment},
                is_active='{$is_active}'
            ";

        $this->pdo->query($sql);

        $result = $this->getComments($id_product);

        return $result;
    }

    public function Show($comment)
    {
        array_pop($comment);
        $res = '<br>';
        foreach ($comment as $one_com)
        {
            $res .= "<div class='panel panel-warning' id='comments'><div class='panel-heading'>";
            $res .= "<h3 class='panel-title'>Name: <a>" . $one_com['name'] . "</a> Time:" . $one_com['date_time'] . "</h3></div>";
            $res .= "<div class='panel-body'>" . $one_com['comment'] . "</div></div>";
        }
        return $res;
    }
    
}