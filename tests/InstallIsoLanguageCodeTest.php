<?php

namespace MichaelDrennen\Geonames\Tests;

class InstallIsoLanguageCodeTest extends BaseInstallTestCase {

    /**
     * @test
     * @group install
     * @group iso
     */
    public function testIsoLanguageCodeCommand() {
        $this->artisan( 'geonames:iso-language-code', [ '--connection' => $this->DB_CONNECTION ] );
        $isoLanguageCodes = \MichaelDrennen\Geonames\Models\IsoLanguageCode::all();
        $this->assertInstanceOf( \Illuminate\Support\Collection::class, $isoLanguageCodes );
        $this->assertNotEmpty( $isoLanguageCodes );
        $this->assertInstanceOf( \MichaelDrennen\Geonames\Models\IsoLanguageCode::class, $isoLanguageCodes->first() );
    }


    /**
     * @test
     * @group install
     * @group iso
     */
    public function testIsoLanguageCodeCommandFailureWithNonExistentConnection() {
        $this->expectException( \Exception::class );
        $this->artisan( 'geonames:iso-language-code', [ '--connection' => 'i-dont-exist' ] );
    }


}