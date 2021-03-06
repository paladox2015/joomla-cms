<?php
/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-01-31 at 11:15:48.
 */
class JGithubPackageUsersFollowersTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @var    JRegistry  Options for the GitHub object.
	 * @since  11.4
	 */
	protected $options;

	/**
	 * @var    JGithubHttp  Mock client object.
	 * @since  11.4
	 */
	protected $client;

	/**
	 * @var    JHttpResponse  Mock response object.
	 * @since  12.3
	 */
	protected $response;

	/**
     * @var JGithubPackageUsersFollowers
     */
    protected $object;

	/**
	 * @var    string  Sample JSON string.
	 * @since  12.3
	 */
	protected $sampleString = '{"a":1,"b":2,"c":3,"d":4,"e":5}';

	/**
	 * @var    string  Sample JSON error message.
	 * @since  12.3
	 */
	protected $errorString = '{"message": "Generic Error"}';

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 *
	 * @since   ¿
	 *
	 * @return  void
	 */
	protected function setUp()
	{
		parent::setUp();

		$this->options  = new JRegistry;
		$this->client   = $this->getMock('JGithubHttp', array('get', 'post', 'delete', 'patch', 'put'));
		$this->response = $this->getMock('JHttpResponse');

		$this->object = new JGithubPackageUsersFollowers($this->options, $this->client);
	}

    /**
     * @covers JGithubPackageUsersFollowers::getList
     * @todo   Implement testGetList().
     */
    public function testGetList()
    {
	    $this->response->code = 200;
	    $this->response->body = $this->sampleString;

	    $this->client->expects($this->once())
		    ->method('get')
		    ->with('/user/followers')
		    ->will($this->returnValue($this->response));

	    $this->assertThat(
		    $this->object->getList(),
		    $this->equalTo(json_decode($this->sampleString))
	    );
    }

	/**
	 * @covers JGithubPackageUsersFollowers::getList
	 * @todo   Implement testGetList().
	 */
	public function testGetListWithUser()
	{
		$this->response->code = 200;
		$this->response->body = $this->sampleString;

		$this->client->expects($this->once())
			->method('get')
			->with('/users/joomla/followers')
			->will($this->returnValue($this->response));

		$this->assertThat(
			$this->object->getList('joomla'),
			$this->equalTo(json_decode($this->sampleString))
		);
	}

    /**
     * @covers JGithubPackageUsersFollowers::getListFollowedBy
     * @todo   Implement testGetListFollowedBy().
     */
    public function testGetListFollowedBy()
    {
	    $this->response->code = 200;
	    $this->response->body = $this->sampleString;

	    $this->client->expects($this->once())
		    ->method('get')
		    ->with('/user/following')
		    ->will($this->returnValue($this->response));

	    $this->assertThat(
		    $this->object->getListFollowedBy(),
		    $this->equalTo(json_decode($this->sampleString))
	    );
    }

	/**
	 * @covers JGithubPackageUsersFollowers::getListFollowedBy
	 * @todo   Implement testGetListFollowedBy().
	 */
	public function testGetListFollowedByWithUser()
	{
		$this->response->code = 200;
		$this->response->body = $this->sampleString;

		$this->client->expects($this->once())
			->method('get')
			->with('/users/joomla/following')
			->will($this->returnValue($this->response));

		$this->assertThat(
			$this->object->getListFollowedBy('joomla'),
			$this->equalTo(json_decode($this->sampleString))
		);
	}

	/**
     * @covers JGithubPackageUsersFollowers::check
     * @todo   Implement testCheck().
     */
    public function testCheck()
    {
	    $this->response->code = 204;
	    $this->response->body = true;

	    $this->client->expects($this->once())
		    ->method('get')
		    ->with('/user/following/joomla')
		    ->will($this->returnValue($this->response));

	    $this->assertThat(
		    $this->object->check('joomla'),
		    $this->equalTo($this->response->body)
	    );
    }

	/**
	 * @covers JGithubPackageUsersFollowers::check
	 * @todo   Implement testCheck().
	 */
	public function testCheckNo()
	{
		$this->response->code = 404;
		$this->response->body = false;

		$this->client->expects($this->once())
			->method('get')
			->with('/user/following/joomla')
			->will($this->returnValue($this->response));

		$this->assertThat(
			$this->object->check('joomla'),
			$this->equalTo($this->response->body)
		);
	}

	/**
	 * @covers JGithubPackageUsersFollowers::check
	 * @todo   Implement testCheck().
	 *
	 * @expectedException UnexpectedValueException
	 */
	public function testCheckUnexpected()
	{
		$this->response->code = 666;
		$this->response->body = false;

		$this->client->expects($this->once())
			->method('get')
			->with('/user/following/joomla')
			->will($this->returnValue($this->response));

		$this->assertThat(
			$this->object->check('joomla'),
			$this->equalTo($this->response->body)
		);
	}

	/**
     * @covers JGithubPackageUsersFollowers::follow
     * @todo   Implement testFollow().
     */
    public function testFollow()
    {
	    $this->response->code = 204;
	    $this->response->body = '';

	    $this->client->expects($this->once())
		    ->method('put')
		    ->with('/user/following/joomla')
		    ->will($this->returnValue($this->response));

	    $this->assertThat(
		    $this->object->follow('joomla'),
		    $this->equalTo($this->response->body)
	    );
    }

    /**
     * @covers JGithubPackageUsersFollowers::unfollow
     * @todo   Implement testUnfollow().
     */
    public function testUnfollow()
    {
	    $this->response->code = 204;
	    $this->response->body = '';

	    $this->client->expects($this->once())
		    ->method('delete')
		    ->with('/user/following/joomla')
		    ->will($this->returnValue($this->response));

	    $this->assertThat(
		    $this->object->unfollow('joomla'),
		    $this->equalTo($this->response->body)
	    );
    }
}
