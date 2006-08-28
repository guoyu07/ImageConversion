<?php
/**
 * ezcImageConversionHandlerGdTest
 *
 * @package ImageConversion
 * @version //autogentag//
 * @copyright Copyright (C) 2005, 2006 eZ systems as. All rights reserved.
 * @license http://ez.no/licenses/new_bsd New BSD License
 */

/**
 * Test suite for ImageFiltersShell class.
 *
 * @package ImageConversion
 * @version //autogentag//
 */
class ezcImageConversionFiltersShellTest extends ezcImageConversionTestCase
{

    protected $handler;

    protected $imageReference;

    protected function getActiveReference()
    {
        $handlerArr = (array) $this->handler;
        return $handlerArr["\0ezcImageMethodcallHandler\0activeReference"];
    }

	public static function suite()
	{
		return new ezcTestSuite( "ezcImageConversionFiltersShellTest" );
	}

    public function setUp()
    {
        $this->handler = new ezcImageImagemagickHandler( ezcImageImagemagickHandler::defaultSettings() );
        $this->imageReference = $this->handler->load( $this->testFiles['jpeg'] );
    }

    public function tearDown()
    {
        unset( $this->handler );
    }

    public function testScale()
    {
        $this->handler->scale( 500, 500, ezcImageGeometryFilters::SCALE_BOTH );
        // REGENERATE # $this->handler->save( $this->getActiveReference(), $this->getReferencePath() );
        $this->handler->save( $this->getActiveReference(), $this->getTempPath() );
        $this->handler->close( $this->getActiveReference() );
        $this->assertImageSimilar(
            $this->getReferencePath(),
            $this->getTempPath(),
            "Image not rendered as expected.",
            ezcImageConversionTestCase::DEFAULT_SIMILARITY_GAP
        );
    }

    public function testScaleDown_do()
    {
        $this->handler->scale( 500, 2, ezcImageGeometryFilters::SCALE_DOWN );
        // REGENERATE # $this->handler->save( $this->getActiveReference(), $this->getReferencePath() );
        $this->handler->save( $this->getActiveReference(), $this->getTempPath() );
        $this->handler->close( $this->getActiveReference() );
        $this->assertImageSimilar(
            $this->getReferencePath(),
            $this->getTempPath(),
            "Image not rendered as expected.",
            ezcImageConversionTestCase::DEFAULT_SIMILARITY_GAP
        );
    }

    public function testScaleDown_dont()
    {
        $this->handler->scale( 500, 500, ezcImageGeometryFilters::SCALE_DOWN );
        // REGENERATE # $this->handler->save( $this->getActiveReference(), $this->getReferencePath() );
        $this->handler->save( $this->getActiveReference(), $this->getTempPath() );
        $this->handler->close( $this->getActiveReference() );
        $this->assertImageSimilar(
            $this->getReferencePath(),
            $this->getTempPath(),
            "Image not rendered as expected.",
            ezcImageConversionTestCase::DEFAULT_SIMILARITY_GAP
        );
    }

    public function testScaleUp_do()
    {
        $this->handler->scale( 500, 500, ezcImageGeometryFilters::SCALE_UP );
        // REGENERATE # $this->handler->save( $this->getActiveReference(), $this->getReferencePath() );
        $this->handler->save( $this->getActiveReference(), $this->getTempPath() );
        $this->handler->close( $this->getActiveReference() );
        $this->assertImageSimilar(
            $this->getReferencePath(),
            $this->getTempPath(),
            "Image not rendered as expected.",
            ezcImageConversionTestCase::DEFAULT_SIMILARITY_GAP
        );
    }

    public function testScaleUp_dont()
    {
        $this->handler->scale( 2, 2, ezcImageGeometryFilters::SCALE_UP );
        // REGENERATE # $this->handler->save( $this->getActiveReference(), $this->getReferencePath() );
        $this->handler->save( $this->getActiveReference(), $this->getTempPath() );
        $this->handler->close( $this->getActiveReference() );
        $this->assertImageSimilar(
            $this->getReferencePath(),
            $this->getTempPath(),
            "Image not rendered as expected.",
            ezcImageConversionTestCase::DEFAULT_SIMILARITY_GAP
        );
    }

    public function testScaleWidthBoth()
    {
        $this->handler->scale( 2, 2, ezcImageGeometryFilters::SCALE_UP );
        $this->handler->scaleWidth( 50, ezcImageGeometryFilters::SCALE_BOTH );
        // REGENERATE # $this->handler->save( $this->getActiveReference(), $this->getReferencePath() );
        $this->handler->save( $this->getActiveReference(), $this->getTempPath() );
        $this->handler->close( $this->getActiveReference() );
        $this->assertImageSimilar(
            $this->getReferencePath(),
            $this->getTempPath(),
            "Image not rendered as expected.",
            ezcImageConversionTestCase::DEFAULT_SIMILARITY_GAP
        );
    }

    public function testScaleWidthUp_1()
    {
        $this->handler->scaleWidth( 50, ezcImageGeometryFilters::SCALE_UP );
        // REGENERATE # $this->handler->save( $this->getActiveReference(), $this->getReferencePath() );
        $this->handler->save( $this->getActiveReference(), $this->getTempPath() );
        $this->handler->close( $this->getActiveReference() );
        $this->assertImageSimilar(
            $this->getReferencePath(),
            $this->getTempPath(),
            "Image not rendered as expected.",
            ezcImageConversionTestCase::DEFAULT_SIMILARITY_GAP
        );
    }

    public function testScaleWidthUp_2()
    {
        $this->handler->scaleWidth( 300, ezcImageGeometryFilters::SCALE_UP );
        // REGENERATE # $this->handler->save( $this->getActiveReference(), $this->getReferencePath() );
        $this->handler->save( $this->getActiveReference(), $this->getTempPath() );
        $this->handler->close( $this->getActiveReference() );
        $this->assertImageSimilar(
            $this->getReferencePath(),
            $this->getTempPath(),
            "Image not rendered as expected.",
            ezcImageConversionTestCase::DEFAULT_SIMILARITY_GAP
        );
    }

    public function testScaleWidthDown_1()
    {
        $this->handler->scaleWidth( 300, ezcImageGeometryFilters::SCALE_DOWN );
        // REGENERATE # $this->handler->save( $this->getActiveReference(), $this->getReferencePath() );
        $this->handler->save( $this->getActiveReference(), $this->getTempPath() );
        $this->handler->close( $this->getActiveReference() );
        $this->assertImageSimilar(
            $this->getReferencePath(),
            $this->getTempPath(),
            "Image not rendered as expected.",
            ezcImageConversionTestCase::DEFAULT_SIMILARITY_GAP
        );
    }

    public function testScaleWidthDown_2()
    {
        $this->handler->scaleWidth( 50, ezcImageGeometryFilters::SCALE_DOWN );
        // REGENERATE # $this->handler->save( $this->getActiveReference(), $this->getReferencePath() );
        $this->handler->save( $this->getActiveReference(), $this->getTempPath() );
        $this->handler->close( $this->getActiveReference() );
        $this->assertImageSimilar(
            $this->getReferencePath(),
            $this->getTempPath(),
            "Image not rendered as expected.",
            ezcImageConversionTestCase::DEFAULT_SIMILARITY_GAP
        );
    }

    public function testScaleHeightUp_1()
    {
        $this->handler->scaleHeight( 300, ezcImageGeometryFilters::SCALE_UP );
        // REGENERATE # $this->handler->save( $this->getActiveReference(), $this->getReferencePath() );
        $this->handler->save( $this->getActiveReference(), $this->getTempPath() );
        $this->handler->close( $this->getActiveReference() );
        $this->assertImageSimilar(
            $this->getReferencePath(),
            $this->getTempPath(),
            "Image not rendered as expected.",
            ezcImageConversionTestCase::DEFAULT_SIMILARITY_GAP
        );
    }

    public function testScaleHeightUp_2()
    {
        $this->handler->scaleHeight( 300, ezcImageGeometryFilters::SCALE_DOWN );
        // REGENERATE # $this->handler->save( $this->getActiveReference(), $this->getReferencePath() );
        $this->handler->save( $this->getActiveReference(), $this->getTempPath() );
        $this->handler->close( $this->getActiveReference() );
        $this->assertImageSimilar(
            $this->getReferencePath(),
            $this->getTempPath(),
            "Image not rendered as expected.",
            ezcImageConversionTestCase::DEFAULT_SIMILARITY_GAP
        );
    }

    public function testScaleHeightDown_1()
    {
        $this->handler->scaleHeight( 30, ezcImageGeometryFilters::SCALE_UP );
        // REGENERATE # $this->handler->save( $this->getActiveReference(), $this->getReferencePath() );
        $this->handler->save( $this->getActiveReference(), $this->getTempPath() );
        $this->handler->close( $this->getActiveReference() );
        $this->assertImageSimilar(
            $this->getReferencePath(),
            $this->getTempPath(),
            "Image not rendered as expected.",
            ezcImageConversionTestCase::DEFAULT_SIMILARITY_GAP
        );
    }

    public function testScaleHeightDown_2()
    {
        $this->handler->scaleHeight( 30, ezcImageGeometryFilters::SCALE_DOWN );
        // REGENERATE # $this->handler->save( $this->getActiveReference(), $this->getReferencePath() );
        $this->handler->save( $this->getActiveReference(), $this->getTempPath() );
        $this->handler->close( $this->getActiveReference() );
        $this->assertImageSimilar(
            $this->getReferencePath(),
            $this->getTempPath(),
            "Image not rendered as expected.",
            ezcImageConversionTestCase::DEFAULT_SIMILARITY_GAP
        );
    }

    public function testScalePercent_1()
    {
        $this->handler->scalePercent( 50, 50 );
        // REGENERATE # $this->handler->save( $this->getActiveReference(), $this->getReferencePath() );
        $this->handler->save( $this->getActiveReference(), $this->getTempPath() );
        $this->handler->close( $this->getActiveReference() );
        $this->assertImageSimilar(
            $this->getReferencePath(),
            $this->getTempPath(),
            "Image not rendered as expected.",
            ezcImageConversionTestCase::DEFAULT_SIMILARITY_GAP
        );
    }

    public function testScalePercent_2()
    {
        $this->handler->scaleExact( 200, 200 );
        // REGENERATE # $this->handler->save( $this->getActiveReference(), $this->getReferencePath() );
        $this->handler->save( $this->getActiveReference(), $this->getTempPath() );
        $this->handler->close( $this->getActiveReference() );
        $this->assertImageSimilar(
            $this->getReferencePath(),
            $this->getTempPath(),
            "Image not rendered as expected.",
            ezcImageConversionTestCase::DEFAULT_SIMILARITY_GAP
        );
    }

    public function testScaleExact_1()
    {
        $this->handler->scaleExact( 200, 200 );
        $this->handler->scaleExact( 200, 200 );
        // REGENERATE # $this->handler->save( $this->getActiveReference(), $this->getReferencePath() );
        $this->handler->save( $this->getActiveReference(), $this->getTempPath() );
        $this->handler->close( $this->getActiveReference() );
        $this->assertImageSimilar(
            $this->getReferencePath(),
            $this->getTempPath(),
            "Image not rendered as expected.",
            ezcImageConversionTestCase::DEFAULT_SIMILARITY_GAP
        );
    }

    public function testScaleExact_2()
    {
        $this->handler->scaleExact( 10, 200 );
        // REGENERATE # $this->handler->save( $this->getActiveReference(), $this->getReferencePath() );
        $this->handler->save( $this->getActiveReference(), $this->getTempPath() );
        $this->handler->close( $this->getActiveReference() );
        $this->assertImageSimilar(
            $this->getReferencePath(),
            $this->getTempPath(),
            "Image not rendered as expected.",
            ezcImageConversionTestCase::DEFAULT_SIMILARITY_GAP
        );
    }

    public function testScaleExact_3()
    {
        $this->handler->scaleExact( 200, 10 );
        // REGENERATE # $this->handler->save( $this->getActiveReference(), $this->getReferencePath() );
        $this->handler->save( $this->getActiveReference(), $this->getTempPath() );
        $this->handler->close( $this->getActiveReference() );
        $this->assertImageSimilar(
            $this->getReferencePath(),
            $this->getTempPath(),
            "Image not rendered as expected.",
            ezcImageConversionTestCase::DEFAULT_SIMILARITY_GAP
        );
    }

    public function testCrop_1()
    {
        $this->handler->crop( 50, 38, 50, 37 );
        // REGENERATE # $this->handler->save( $this->getActiveReference(), $this->getReferencePath() );
        $this->handler->save( $this->getActiveReference(), $this->getTempPath() );
        $this->handler->close( $this->getActiveReference() );
        $this->assertImageSimilar(
            $this->getReferencePath(),
            $this->getTempPath(),
            "Image not rendered as expected.",
            ezcImageConversionTestCase::DEFAULT_SIMILARITY_GAP
        );
    }

    public function testCrop_2()
    {
        $this->handler->crop( 100, 75, -50, -37 );
        // REGENERATE # $this->handler->save( $this->getActiveReference(), $this->getReferencePath() );
        $this->handler->save( $this->getActiveReference(), $this->getTempPath() );
        $this->handler->close( $this->getActiveReference() );
        $this->assertImageSimilar(
            $this->getReferencePath(),
            $this->getTempPath(),
            "Image not rendered as expected.",
            ezcImageConversionTestCase::DEFAULT_SIMILARITY_GAP
        );
    }

    public function testCrop_3()
    {
        $this->handler->crop( 50, 75, 250, 38 );
        // REGENERATE # $this->handler->save( $this->getActiveReference(), $this->getReferencePath() );
        $this->handler->save( $this->getActiveReference(), $this->getTempPath() );
        $this->handler->close( $this->getActiveReference() );
        $this->assertImageSimilar(
            $this->getReferencePath(),
            $this->getTempPath(),
            "Image not rendered as expected.",
            ezcImageConversionTestCase::DEFAULT_SIMILARITY_GAP
        );
    }

    public function testCrop_0_Offset()
    {
        $this->handler->crop( 0, 0, 10, 10 );
        // REGENERATE # $this->handler->save( $this->getActiveReference(), $this->getReferencePath() );
        $this->handler->save( $this->getActiveReference(), $this->getTempPath() );
        $this->handler->close( $this->getActiveReference() );
        $this->assertImageSimilar(
            $this->getReferencePath(),
            $this->getTempPath(),
            "Image not rendered as expected.",
            ezcImageConversionTestCase::DEFAULT_SIMILARITY_GAP
        );
    }

    public function testColorspaceGrey()
    {
        $this->handler->colorspace( ezcImageColorspaceFilters::COLORSPACE_GREY );
        // REGENERATE # $this->handler->save( $this->getActiveReference(), $this->getReferencePath() );
        $this->handler->save( $this->getActiveReference(), $this->getTempPath() );
        $this->handler->close( $this->getActiveReference() );
        $this->assertImageSimilar(
            $this->getReferencePath(),
            $this->getTempPath(),
            "Image not rendered as expected.",
            ezcImageConversionTestCase::DEFAULT_SIMILARITY_GAP
        );
    }

    public function testColorspaceMonochrome()
    {
        $this->handler->colorspace( ezcImageColorspaceFilters::COLORSPACE_MONOCHROME );
        // REGENERATE # $this->handler->save( $this->getActiveReference(), $this->getReferencePath() );
        $this->handler->save( $this->getActiveReference(), $this->getTempPath() );
        $this->handler->close( $this->getActiveReference() );
        $this->assertImageSimilar(
            $this->getReferencePath(),
            $this->getTempPath(),
            "Image not rendered as expected.",
            ezcImageConversionTestCase::DEFAULT_SIMILARITY_GAP
        );
    }

    public function testColorspaceSepia()
    {
        $this->handler->colorspace( ezcImageColorspaceFilters::COLORSPACE_SEPIA );
        // REGENERATE # $this->handler->save( $this->getActiveReference(), $this->getReferencePath() );
        $this->handler->save( $this->getActiveReference(), $this->getTempPath() );
        $this->handler->close( $this->getActiveReference() );
        $this->assertImageSimilar(
            $this->getReferencePath(),
            $this->getTempPath(),
            "Image not rendered as expected.",
            ezcImageConversionTestCase::DEFAULT_SIMILARITY_GAP
        );
    }

    public function testNoiseUniform()
    {
        $this->handler->noise( 'Uniform' );
        // REGENERATE # $this->handler->save( $this->getActiveReference(), $this->getReferencePath() );
        $this->handler->save( $this->getActiveReference(), $this->getTempPath() );
        $this->handler->close( $this->getActiveReference() );
        $this->assertImageSimilar(
            $this->getReferencePath(),
            $this->getTempPath(),
            "Image not rendered as expected.",
            // Noise is normally different each time
            200
        );
    }

    public function testNoiseGaussian()
    {
        $this->handler->noise( 'Gaussian' );
        // REGENERATE # $this->handler->save( $this->getActiveReference(), $this->getReferencePath() );
        $this->handler->save( $this->getActiveReference(), $this->getTempPath() );
        $this->handler->close( $this->getActiveReference() );
        $this->assertImageSimilar(
            $this->getReferencePath(),
            $this->getTempPath(),
            "Image not rendered as expected.",
            // Noise is normally different each time
            30000
        );
    }

    public function testNoiseMultiplicative()
    {
        $this->handler->noise( 'Multiplicative' );
        // REGENERATE # $this->handler->save( $this->getActiveReference(), $this->getReferencePath() );
        $this->handler->save( $this->getActiveReference(), $this->getTempPath() );
        $this->handler->close( $this->getActiveReference() );
        $this->assertImageSimilar(
            $this->getReferencePath(),
            $this->getTempPath(),
            "Image not rendered as expected.",
            // Noise is normally different each time
            30000
        );
    }

    public function testNoiseImpulse()
    {
        $this->handler->noise( 'Impulse' );
        // REGENERATE # $this->handler->save( $this->getActiveReference(), $this->getReferencePath() );
        $this->handler->save( $this->getActiveReference(), $this->getTempPath() );
        $this->handler->close( $this->getActiveReference() );
        $this->assertImageSimilar(
            $this->getReferencePath(),
            $this->getTempPath(),
            "Image not rendered as expected.",
            // Noise is normally different each time
            10000
        );
    }

    public function testNoiseLaplacian()
    {
        $this->handler->noise( 'Laplacian' );
        // REGENERATE # $this->handler->save( $this->getActiveReference(), $this->getReferencePath() );
        $this->handler->save( $this->getActiveReference(), $this->getTempPath() );
        $this->handler->close( $this->getActiveReference() );
        $this->assertImageSimilar(
            $this->getReferencePath(),
            $this->getTempPath(),
            "Image not rendered as expected.",
            // Noise is normally different each time
            22000
        );
    }

    public function testNoisePoisson()
    {
        $this->handler->noise( 'Poisson' );
        // REGENERATE # $this->handler->save( $this->getActiveReference(), $this->getReferencePath() );
        $this->handler->save( $this->getActiveReference(), $this->getTempPath() );
        $this->handler->close( $this->getActiveReference() );
        $this->assertImageSimilar(
            $this->getReferencePath(),
            $this->getTempPath(),
            "Image not rendered as expected.",
            // Noise is normally different each time
            12000
        );
    }

    public function testSwirl_10()
    {
        $this->handler->swirl( 10 );
        // REGENERATE # $this->handler->save( $this->getActiveReference(), $this->getReferencePath() );
        $this->handler->save( $this->getActiveReference(), $this->getTempPath() );
        $this->handler->close( $this->getActiveReference() );
        $this->assertImageSimilar(
            $this->getReferencePath(),
            $this->getTempPath(),
            "Image not rendered as expected.",
            ezcImageConversionTestCase::DEFAULT_SIMILARITY_GAP
        );
    }

    public function testSwirl_50()
    {
        $this->handler->swirl( 50 );
        // REGENERATE # $this->handler->save( $this->getActiveReference(), $this->getReferencePath() );
        $this->handler->save( $this->getActiveReference(), $this->getTempPath() );
        $this->handler->close( $this->getActiveReference() );
        $this->assertImageSimilar(
            $this->getReferencePath(),
            $this->getTempPath(),
            "Image not rendered as expected.",
            ezcImageConversionTestCase::DEFAULT_SIMILARITY_GAP
        );
    }

    public function testSwirl_100()
    {
        $this->handler->swirl( 100 );
        // REGENERATE # $this->handler->save( $this->getActiveReference(), $this->getReferencePath() );
        $this->handler->save( $this->getActiveReference(), $this->getTempPath() );
        $this->handler->close( $this->getActiveReference() );
        $this->assertImageSimilar(
            $this->getReferencePath(),
            $this->getTempPath(),
            "Image not rendered as expected.",
            ezcImageConversionTestCase::DEFAULT_SIMILARITY_GAP
        );
    }

    public function testBorder_2()
    {
        $this->handler->border( 2, array( 0x00, 0x00, 0xFF ) );
        // REGENERATE # $this->handler->save( $this->getActiveReference(), $this->getReferencePath() );
        $this->handler->save( $this->getActiveReference(), $this->getTempPath() );
        $this->handler->close( $this->getActiveReference() );
        $this->assertImageSimilar(
            $this->getReferencePath(),
            $this->getTempPath(),
            "Image not rendered as expected.",
            ezcImageConversionTestCase::DEFAULT_SIMILARITY_GAP
        );
    }

    public function testBorder_5()
    {
        $this->handler->border( 5, array( 255, 0, 0 ) );
        // REGENERATE # $this->handler->save( $this->getActiveReference(), $this->getReferencePath() );
        $this->handler->save( $this->getActiveReference(), $this->getTempPath() );
        $this->handler->close( $this->getActiveReference() );
        $this->assertImageSimilar(
            $this->getReferencePath(),
            $this->getTempPath(),
            "Image not rendered as expected.",
            ezcImageConversionTestCase::DEFAULT_SIMILARITY_GAP
        );
    }
}
?>
