<?php

class Pronamic_Pay_Gateways_IDealBasic_TestNotificationParser extends WP_UnitTestCase {
	function test_init() {
		$filename = __DIR__ . '/Mock/notification.xml';

		$simplexml = simplexml_load_file( $filename );

		$this->assertInstanceOf( 'SimpleXMLElement', $simplexml );

		return $simplexml;
	}

	/**
	 * Test parser
	 *
	 * @depends test_init
	 */
	function test_parser( $simplexml ) {
		$notification = Pronamic_WP_Pay_Gateways_IDealBasic_XML_NotificationParser::parse( $simplexml );

		$this->assertInstanceOf( 'Pronamic_WP_Pay_Gateways_IDealBasic_Notification', $notification );

		return $notification;
	}

	/**
	 * Test values
	 *
	 * @depends test_parser
	 */
	function test_values( $notification ) {
		$expected = new Pronamic_WP_Pay_Gateways_IDealBasic_Notification();
		$expected->set_date( new DateTime( '20131022120742' ) );
		$expected->set_transaction_id( '0020000048638175' );
		$expected->set_purchase_id( '1382436458' );
		$expected->set_status( Pronamic_WP_Pay_Gateways_IDeal_Statuses::SUCCESS );

		$this->assertEquals( $expected, $notification );
	}
}
