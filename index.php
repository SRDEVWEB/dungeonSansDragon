<?php
// [abstract] Personnage (variables):
// - nom (string)
// - dateDeCreation (\DateTime)
// - phyPower (int) (0-100)
// - magPower (int) (0-100)
// - armor (int) (0-100)
// - escape (int) (0-100) // chance to escape // rogue.escape = 95 // warrior.escape = 50 => mt_rand(0,  (escape - 100))
// - life (int) (0-100)
// - mana (int) (0-100)
// - classe (string) : guerrier, mage, voleur, archer, ....
// _______ inventory & stuff
// - weapon (Weapon)  : equipped item
// - shield (Shield) : equipped item
// - bag (Bag)

abstract class Perso
{
    protected string $nom;
    protected datetime $dateDeCreation;
    protected int $phyPower;
    protected int $magPower;
    protected int $escape;
    protected int $armor;
    protected int $life;
    protected int $mana;
    protected string $classe;
    protected Bag $inventory;
    protected Weapon $weapon;
    protected Shield $shield;

    public function __construct(string $nom, string $classe)
    {
        $this->nom = $nom;
        $this->dateDeCreation = new DateTime();
        $this->phyPower = 100;
        $this->magPower = 50;
        $this->armor = 50;
        $this->escape = 50;
        $this->life = 100;
        $this->mana = 10;
        $this->classe = $classe;
        $this->inventory = new Bag();

    }

    /**
     * @return string
     */
    public function getShield(): string
    {
        return $this->shield;
    }

    /**
     * @param string $shield
     */
    public function setShield(string $shield): perso
    {
        $this->shield = $shield;
        return $this;
    }

    /**
     * @return string
     */
    public function getWeapon(): string
    {
        return $this->weapon;
    }

    /**
     * @param string $weapon
     */
    public function setWeapon(string $weapon): perso
    {
        $this->weapon = $weapon;
        return $this;
    }

    /**
     * @return Bag
     */
    public function getInventory()
    {
        return $this->inventory;
    }

    /**
     * @param Bag $inventory
     */
    public function setInventory(string $inventory): Perso
    {
        $this->inventory = $inventory;
        return $this;
    }

    /**
     * @return string
     */
    public function getClasse()
    {
        return $this->classe;
    }

    /**
     * @param string $classe
     */
    public function setClasse(string $classe): Perso
    {
        $this->classe = $classe;
        return $this;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): Perso
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }


    /**
     * @return datetime
     */
    public function getDateDeCreation(): DateTime
    {
        return $this->dateDeCreation;
    }

    /**
     * @param datetime $dateDeCreation
     */
    public function setDateDeCreation($dateDeCreation): Perso
    {
        $this->dateDeCreation = $dateDeCreation;
        return $this;
    }

    /**
     * @return int
     */
    public function getPhyPower()
    {
        return $this->phyPower;
    }

    /**
     * @param int $phyPower
     */
    public function setPhyPower($phyPower): Perso
    {
        $this->phyPower = $phyPower;
        return $this;
    }

    /**
     * @return int
     */
    public function getMagPower()
    {
        return $this->magPower;
    }

    /**
     * @param int $magPower
     */
    public function setMagPower($magPower): Perso
    {
        $this->magPower = $magPower;
        return $this;
    }

    /**
     * @return int
     */
    public function getArmor()
    {
        return $this->armor;
    }

    /**
     * @param int $armor
     */
    public function setArmor($armor): Perso
    {
        $this->armor = $armor;
        return $this;
    }

    /**
     * @return int
     */
    public function getEscape()
    {
        return $this->escape;
    }

    /**
     * @param int $escape
     */
    public function setEscape($escape): Perso
    {
        $this->escape = $escape;
        return $this;
    }

    /**
     * @return int
     */
    public function getLife()
    {
        return $this->life;
    }

    /**
     * @param int $life
     */
    public function setLife($life): Perso
    {
        $this->life = $life;
        return $this;
    }

    /**
     * @return int
     */
    public function getMana()
    {
        return $this->mana;
    }

    /**
     * @param int $mana
     */
    public function setMana($mana): Perso
    {
        $this->mana = $mana;
        return $this;
    }



}
class Bag {
    protected string $weapon;
    protected string $shield;

}

class Warrior extends Perso
{
public function __construct(string $nom)
{
    parent::__construct($nom, 'Warrior');
    $this->setPhyPower(random_int(10,50));
    $this->setMagPower(random_int(20,50));
    $this->setEscape(random_int(0,100));
}

}
$perso1= new Warrior('Sebastien');

var_dump($perso1, "------------");









// Personnage (méthodes):
// - [public] useItem(Item $item) => if item.equipable === false
//
// - [public] equipItem (Item $item) => if item.equipable === true
// item is Shield : ($item === Shield && Personnage.weapon.isTwoHanded === false)
// item is weapon : ($item === Weapon) => si item.isTwoHanded === true => unequipItem($shield)
//
// - [public] unequipItem (Item $item) : deséquiper un item
//
// - [public] attackTarget(Personnage $target) : attaquer un personnage => code pour calculer les dégats et l'utilisation de mana
// $damage = [calcul des dmg];
// $target->receiveDamage($damage);
//
// - [public] receiveDamage(int $damage) : recevoir des dégats => code pour calculer les dégats
//
// - [private] isDodged() : calculer si le personnage a esquivé l'attaque mt_rand(0,  (escape - 100)) === (escape - 100)
//
// - [public] isAlive() : vérifier si le personnage est en vie

// Mage extends Personnage
// Warrior extends Personnage
// Rogue extends Personnage

// [abstract] Foe extends Personnage => nom random, stats random
// Foe : bat|zombie|orc|gobelin|squelette
// each Foe override attackTarget(Personnage $target) => code pour calculer les dégats et l'utilisation de mana

// [abstract] item :
// - name (string)
// - description (string)
// - equipable (bool)
// - type (string) : weapon|shield|armor|potion|food|key|quest|misc

// weapon extend item :
// - damage (int)
// - isTwoHanded (bool)
// - weaponClass (string) : sword|axe|dagger|bow|staff|wand|spear|hammer|fist

// shield extend item :
// - armor (int)

// potion extend item :
// - const TYPE_HEAL = 'heal', TYPE_MANA = 'mana'
// - amount (float)
// - type (string)(self::TYPE_HEAL|self::TYPE_MANA)
// - used (bool) (false)

// Item > Weapon > Sword > LongSword
// Item > Weapon > Sword > GreatSword
// Item > Weapon > Staff > FireStaff
// Item > Shield > SmallShield
// Item > utility > Potion > HealthPotion
// Item > utility > Potion > ManaPotion

// Personnage->useItem(Item $item)
// Personnage->equipItem(Item $item) -> if item.equipable === true
// Personnage->attackTarget(Personnage $target)
