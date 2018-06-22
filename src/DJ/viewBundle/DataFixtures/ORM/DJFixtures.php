<?php



use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class DJFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {   
        $nameTricks = [
            1 => 'mute',
            2 => 'sad',
            3 => 'indy',
            4 => 'stalefish',
            5 => 'tail grab',
            6 => 'nose grab',
            7 => 'japan air',
            8 => 'seat belt',
            9 => 'truck driver',
            10 => 'salom air'
        ];
        
        $sizeNameTricks = count($nameTricks);
        
        $figureDescription = "Une rotation peut être frontside ou backside : une rotation frontside correspond à une rotation orientée vers la carre backside. Cela peut paraître incohérent mais l'origine étant que dans un halfpipe ou une rampe de skateboard, une rotation frontside se déclenche naturellement depuis une position frontside (i.e. l'appui se fait sur la carre frontside), et vice-versa. Ainsi pour un rider qui a une position regular (pied gauche devant), une rotation frontside se fait dans le sens inverse des aiguilles d'une montre. Une rotation peut être agrémentée d'un grab, ce qui rend le saut plus esthétique mais aussi plus difficile car la position tweakée a tendance à déséquilibrer le rideur et désaxer la rotation. De plus, le sens de la rotation a tendance à favoriser un sens de grab plutôt qu'un autre. Les rotations de plus de trois tours existent mais sont plus rares, d'abord parce que les modules assez gros pour lancer un tel saut sont rares, et ensuite parce que la vitesse de rotation est tellement élevée qu'un grab devient difficile, ce qui rend le saut considérablement moins esthétique.";
        // create 20 products! Bam!
       
        $user = new \DJ\usersecurityBundle\Entity\User();
        
        $user->setUsername('doctrine');
        $user->setMail('doctrine@doctrine.com');
        $user->setPassword('123');
        $user->setUserphoto('82b0460b8e393e3bb8323fcffef1cad1.jpg');
        $user->setUserCreateDate(new \DateTime());

        
        for ($i = 1; $i < $sizeNameTricks; $i++) {
            
            $figure = new \DJ\viewBundle\Entity\Figures();
            
            $figure->setFigureName($nameTricks[$i]);
            $figure->setFigureDescription($figureDescription);
            $figure->setFigureCreatedate(new \DateTime());
            $figure->setUsers($user);
            $figure->setCategories('ski');
            
            $picture = new \DJ\viewBundle\Entity\Pictures();
            $picture->setFigure($figure);
            $picture->setPictureCreatedate(new \DateTime());
            $picture->setPictureLink($nameTricks[$i].".jpg");
            
            $manager->persist($figure);
            $manager->persist($picture);
            
        }

        $manager->flush();
}
}