<?php
class UserOptions extends BaseModel {
    public $id = 0;
    public $new_tasks_at_bottom = true;
    public $show_animations = true;
    public $show_assignee = true;
    public $multiple_tasks_per_row = false;

    public function __construct($container, $id = 0) {
        parent::__construct('user', $id, $container);

        $this->loadFromBean($this->bean);
    }

    public function updateBean() {
        $bean = $this->bean;

        $bean->id = $this->id;
        $bean->new_tasks_at_bottom = $this->new_tasks_at_bottom;
        $bean->show_animations = $this->show_animations;
        $bean->show_assignee = $this->show_assignee;
        $bean->multiple_tasks_per_row = $this->multiple_tasks_per_row;
    }

    public function loadFromBean($bean) {
        if (!isset($bean->id) || $bean->id === 0) {
            return;
        }

        $this->loadPropertiesFrom($bean);
    }

    public function loadFromJson($json) {
        $obj = json_decode($json);

        if (!isset($obj->id) || $obj->id === 0) {
            return;
        }

        $this->loadPropertiesFrom($obj);
    }

    private function loadPropertiesFrom($obj) {
        $this->id = (int) $obj->id;
        $this->new_tasks_at_bottom = (bool) $obj->new_tasks_at_bottom;
        $this->show_animations = (bool) $obj->show_animations;
        $this->show_assignee = (bool) $obj->show_assignee;
        $this->multiple_tasks_per_row = (bool) $obj->multiple_tasks_per_row;
    }
}
