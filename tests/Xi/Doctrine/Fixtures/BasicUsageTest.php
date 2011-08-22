<?php
namespace Xi\Doctrine\Fixtures;

class BasicUsageTest extends TestCase
{
    /**
     * @test
     */
    public function acceptsConstantValuesInEntityDefinitions()
    {
        $ss = $this->factory
            ->defineEntity('SpaceShip', array(
                'name' => 'My BattleCruiser'
            ))
            ->get('SpaceShip');
        
        $this->assertEquals('My BattleCruiser', $ss->getName());
    }
    
    /**
     * @test
     */
    public function acceptsGeneratorFunctionsInEntityDefinitions()
    {
        $name = "Star";
        $this->factory->defineEntity('SpaceShip', array(
            'name' => function() use (&$name) { return "M/S $name"; }
        ));
        
        $this->assertEquals('M/S Star', $this->factory->get('SpaceShip')->getName());
        $name = "Superstar";
        $this->assertEquals('M/S Superstar', $this->factory->get('SpaceShip')->getName());
    }
    
    /**
     * @test
     */
    public function valuesCanBeOverriddenAtCreationTime()
    {
        $ss = $this->factory
            ->defineEntity('SpaceShip', array(
                'name' => 'My BattleCruiser'
            ))
            ->get('SpaceShip', array('name' => 'My CattleBruiser'));
        $this->assertEquals('My CattleBruiser', $ss->getName());
    }
    
    /**
     * @test
     */
    public function instantiatesCollectionAssociationsToBeEmptyCollections()
    {
        $ss = $this->factory
            ->defineEntity('SpaceShip', array(
                'name' => 'Battlestar Galaxy'
            ))
            ->get('SpaceShip');
        
        $this->assertTrue($ss->getCrew() instanceof \Doctrine\Common\Collections\ArrayCollection);
        $this->assertTrue($ss->getCrew()->isEmpty());
    }
    
    /**
     * @test
     */
    public function unspecifiedFieldsAreLeftNull()
    {
        $this->factory->defineEntity('SpaceShip');
        $this->assertNull($this->factory->get('SpaceShip')->getName());
    }
}