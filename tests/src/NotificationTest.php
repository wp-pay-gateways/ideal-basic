<?php

namespace Pronamic\WordPress\Pay\Gateways\IDealBasic;

use DateTime;
use Pronamic\WordPress\Pay\Payments\PaymentStatus;

class NotificationTest extends \WP_UnitTestCase {
	public function test_notification() {
		$notification = new Notification();
		$notification->set_date( new DateTime() );
		$notification->set_transaction_id( '1234567890' );
		$notification->set_purchase_id( '123456' );
		$notification->set_status( PaymentStatus::SUCCESS );

		$this->assertInstanceOf( 'DateTime', $notification->get_date() );
		$this->assertEquals( '1234567890', $notification->get_transaction_id() );
		$this->assertEquals( '123456', $notification->get_purchase_id() );
		$this->assertEquals( PaymentStatus::SUCCESS, $notification->get_status() );
	}
}
