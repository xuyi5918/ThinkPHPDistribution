<?PHP
Class HomeModel Extends Model{

	protected $tableName='dingdan';
	protected $_validate=array(
		array('Name','require','请填写收货人!'),
		array('Phone','require','请填写联系方式!'),
		array('Address','require','请填写收货地址!'),
	);
}