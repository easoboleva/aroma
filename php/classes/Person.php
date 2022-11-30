<?php

class Person
{
  private $name;
  private $lastname;
  private $age;
  private $hp;
  private $mother;
  private $father;

  function __construct($name, $lastname, $age, $mother = null, $father = null)
  {
    $this->name = $name;
    $this->lastname = $lastname;
    $this->age = $age;
    $this->hp = 100;
    $this->mother = $mother;
    $this->father = $father;
  }

  function sayHi($name)
  {
    return "Hi $name, I`m " . $this->name;
  }

  function setHp($hp)
  {
    if ($this->hp + $hp >= 100) $this->hp = 100;
    else $this->hp = $this->hp + $hp;
  }
  function getHp()
  {
    return $this->hp;
  }
  function getName()
  {
    return $this->name;
  }
  function getMother()
  {
    return $this->mother;
  }
  function getFather()
  {
    return $this->father;
  }

  function getInfo()
  {
    return "
    <h2>A few words about myself.</h2><br>" . "My name is: " . $this->getName() . "<br>my father is: " . $this->getFather()->getName() . "<br>my paternal grandmother is: " . $this->getFather()->getMother()->getName() . "<br>my paternal grandfather is: " . $this->getFather()->getFather()->getName() . "<br>my maternal grandfather is: " . $this->getMother()->getFather()->getName() . "<br>my maternal grandmother is: " . $this->getMother()->getMother()->getName();
    //дописать родню
  }
}
//! Здоровье не может быть более 100

$igor = new Person("Igor", "Petrov", 78); //дед по маме
$rita = new Person("Rita", "Petrova", 75); //бабушка по маме

$eva = new Person("Eva", "Ivanova", 70,); //бабушка по отцу
$sergey = new Person("Sergey", "Ivanov", 70); //дед по отцу

$alex = new Person("Alex", "Ivanov", 42, $eva, $sergey);

$olga = new Person("Olga", "Ivanova", 42, $rita, $igor);
$valera = new Person("Valera", "Ivanov", 15, $olga, $alex);


echo $valera->getInfo();
// echo $valera->getMother()->getFather()->getName();

// $medKit = 50;
// // $alex->hp = $alex->hp - 30; // Упал
// $alex->setHp(-30);
// echo $alex->getHp() . "<br>";
// // $alex->hp = $alex->hp + $medKit; // Нашел аптечку
// $alex->setHp($medKit);
// echo $alex->getHp();
