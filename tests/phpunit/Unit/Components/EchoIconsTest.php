<?php
/**
 * This file is part of the MediaWiki skin Chameleon.
 *
 * @copyright 2021, Morne Alberts
 * @license   GPL-3.0-or-later
 *
 * The Chameleon skin is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by the Free
 * Software Foundation, either version 3 of the License, or (at your option) any
 * later version.
 *
 * The Chameleon skin is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more
 * details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program. If not, see <http://www.gnu.org/licenses/>.
 *
 * @file
 * @ingroup Skins
 */

namespace Skins\Chameleon\Tests\Unit\Components;

use Skins\Chameleon\Tests\Util\MockupFactory;

/**
 * @coversDefaultClass \Skins\Chameleon\Components\EchoIcons
 * @covers ::<private>
 * @covers ::<protected>
 *
 * @group   skins-chameleon
 * @group   mediawiki-databaseless
 *
 * @author Morne Alberts
 * @since 3.2
 * @ingroup Skins
 * @ingroup Test
 */
class EchoIconsTest extends GenericComponentTestCase {

	protected $classUnderTest = '\Skins\Chameleon\Components\EchoIcons';

	/**
	 * @covers ::getHtml
	 * @dataProvider domElementProviderFromSyntheticLayoutFiles
	 */
	public function testGetHtml_ShowIcons( $domElement ) {
		$factory = MockupFactory::makeFactory( $this );
		$chameleonTemplate = $factory->getChameleonSkinTemplateStub();
		$chameleonTemplate->expects( $this->exactly( 2 ) )
			->method( 'makeListItem' )
			->withConsecutive(
				[ 'notifications-alert', [ 'id' => 'pt-notifications-alert'],
					[ 'tag' => 'li' ] ],
				[ 'notifications-notice', [ 'id' => 'pt-notifications-notice'],
					[ 'tag' => 'li' ] ]
			);

		/** @var Component $instance */
		$instance = new $this->classUnderTest( $chameleonTemplate, $domElement );
		$instance->getHtml();
	}

}
