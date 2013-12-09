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

use KeenIO\Client\KeenIOClient;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * @author Michaël Gallego <mic.gallego@gmail.com>
 * @licence MIT
 *
 */
class KeenIOClientFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     * @return KeenIOClient
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');

        if (!isset($config['keen_io'])) {
            throw new Exception\RuntimeException(
                'No config was found for KeenIO. Did you copy the `keen_io.local.php` file to your autoload folder?'
            );
        }

        $config = $config['keen_io'];
        $config = array(
            'projectId' => isset($config['project_id']) ? $config['project_id'] : null,
            'masterKey' => isset($config['master_key']) ? $config['master_key'] : null,
            'readKey'   => isset($config['read_key']) ? $config['read_key'] : null,
            'writeKey'  => isset($config['write_key']) ? $config['write_key'] : null,
            'version'   => isset($config['version']) ? $config['version'] : '3.0'
        );

        return KeenIOClient::factory($config);
    }
}
