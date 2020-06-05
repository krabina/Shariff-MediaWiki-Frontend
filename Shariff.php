<?php
/*
 * Parser that inserts social media buttons
 *
 * For more info see http://mediawiki.org/wiki/Shariff
 *
 * @package MediaWiki
 * @subpackage Extensions
 * @author Niki Hansche
 * @copyright © 2014-2018 Niki Hansche
 * @licence The MIT License (MIT)
 */

class Shariff {
	static function shariffLikeParserFunction_Setup( &$parser ) {
		# Set a function hook associating the "shariffLike_parser" magic word with our function
		$parser->setFunctionHook( 'shariffLike', 'Shariff::shariffLikeParserFunction_Render' );
		return true;
	}

	static function shariffLikeParserFunction_Magic( &$magicWords, $langCode ) {
	        //Set first parameter to 1 to make it case sensitive
		$magicWords['shariffLike'] = array( 0, 'ShariffLike' );
	        return true;
	}

	static function shariffLikeParserFeedHead(&$out, &$sk) {
		$out->addModules( 'ext.Shariff' );

		return true;
	}

 
	static function shariffLikeParserFunction_Render( &$parser, $param1 = '', $param2 = '', $param3 = '' ) {
		global $wgSitename;
		global $wgScriptPath;

		//Get page title and URL
		$output = '<div class="shariff noprint" data-lang="$wgLanguageCode" data-backend-url="'.$wgScriptPath.'/extensions/Shariff/shariff-backend/" data-services="[&quot;twitter&quot;,&quot;facebook&quot;,&quot;pinterest&quot;]"></div>';

		return $parser->insertStripItem($output, $parser->mStripState);;
	}
}
