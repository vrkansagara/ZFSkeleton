<?php
/**
 * Created by PhpStorm.
 * User: vallabh
 * Date: 9/30/15
 * Time: 12:36 AM
 */
namespace ApplicationTest\Controller;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class ApplicationControllerTest extends AbstractHttpControllerTestCase
{
    protected $traceError = true;

    public function setUp()
    {
        $this->setApplicationConfig(
            include '/home/vallabh/git/ZFSkeleton/config/application.config.php'
        );
        parent::setUp();
    }

    public function testIndexActionCanBeAccessed()
    {
        $this->dispatch('/application');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Application');
        $this->assertControllerName('Application\Controller\index');
        $this->assertControllerClass('IndexController');
        $this->assertMatchedRouteName('application');
    }
}
