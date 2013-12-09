<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

namespace KeenIOModule\Factory;

use PHPUnit_Framework_TestCase;
use Zend\ServiceManager\ServiceManager;

/**
 * @author  Michaël Gallego <mic.gallego@gmail.com>
 * @licence MIT
 *
 * @covers \KeenIOModule\Factory\KeenIOClientFactory
 */
class KeenIOClientFactoryTest extends PHPUnit_Framework_TestCase
{
    public function testCanCreateFromFactory()
    {
        $config = array(
            'keen_io' => array(
                'project_id' => '123',
                'master_key' => 'mymasterkey',
                'read_key'   => 'myreadkey',
                'write_key'  => 'mywritekey'
            )
        );

        $serviceManager = new ServiceManager();
        $serviceManager->setService('Config', $config);

        $factory = new KeenIOClientFactory();
        $result  = $factory->createService($serviceManager);

        $this->assertInstanceOf('KeenIO\Client\KeenIOClient', $result);
        $this->assertEquals($config['keen_io']['project_id'], $result->getProjectId());
        $this->assertEquals($config['keen_io']['master_key'], $result->getMasterKey());
        $this->assertEquals($config['keen_io']['read_key'], $result->getReadKey());
        $this->assertEquals($config['keen_io']['write_key'], $result->getWriteKey());
    }
}
