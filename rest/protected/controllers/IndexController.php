<?php
use \Jacwright\RestServer\RestException;
class IndexController
{
	/**
	 * Returns a JSON string object to the browser when hitting the root of the domain
	 *
	 * @url GET /
	 */
	public function index()
	{
		return null;
	}
	/**
	 * Throws an error
	 *
	 * @url GET /error
	 */
	public function throwError() {
		throw new RestException(401, "Empty password not allowed");
	}
// 	/**
// 	 * Get Charts
// 	 *
// 	 * @url GET /charts
// 	 * @url GET /charts/$id
// 	 * @url GET /charts/$id/$date
// 	 * @url GET /charts/$id/$date/$interval/
// 	 * @url GET /charts/$id/$date/$interval/$interval_months
// 	 */
// 	public function getCharts($id=null, $date=null, $interval = 30, $interval_months = 12)
// 	{
// 		echo "$id, $date, $interval, $interval_months";
// 	}
}