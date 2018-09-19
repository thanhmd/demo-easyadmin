<?php
namespace App\DataFixtures;

use App\Entity\Product;
use App\Entity\Admin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // create 20 products! Bam!
        for ($i = 0; $i < 20; $i++) {
            $product = new Product();
            $product->setName('product '.$i);
            $product->setPrice(mt_rand(10, 100));
            $product->setDescription("Des ". $i);
            $product->setTags(array("tags s" . $i, "tag " . $i));
            $product->setEan($i+10000000);
            $product->setFeatures(array("feature " . $i, "feature s" . $i));
            $manager->persist($product);


            $admin = new Admin();
            $admin->setUsername("test " . $i);
            $admin->setEmail("test" . $i . "@gmail.com");
            $admin->setEnabled(1);
            $admin->setPassword(password_hash('123', PASSWORD_BCRYPT));
            $admin->setRoles(['ROLE_ADMIN']); //important for login
            $manager->persist($admin);
        }

        $manager->flush();
    }
}