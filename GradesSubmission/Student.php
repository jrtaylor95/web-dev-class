<?php
  declare(strict_types=1);

  class Student {
    private $name;
    private $grade;

    public function __construct(string $name) {
      $this->name = $name;
      $this->grade = "";
    }

    public function getName() : string {
      return $this->name;
    }

    public function getGrade() : string {
      return $this->grade;
    }

    public function setGrade($grade) {
      $this->grade = $grade;
    }

    public function __toString() : string {
      return "Name: ".$this->name." Grade: ".$this->grade;
    }
  }
?>
