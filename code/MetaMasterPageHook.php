<?php
	class MetaMasterPageHook extends DataObjectDecorator {
		public function MetaMaster() {
			$currentPage = $this->getOwner();
			$siteConfig = SiteConfig::current_site_config();

			$tags = '';
			$tags .= '<meta name="generator" content="SilverStripe - http://silverstripe.org" />'."\n";

			$charset = ContentNegotiator::get_encoding();
			$tags .= '<meta http-equiv="Content-type" content="text/html; charset='. $charset .'" />'."\n";
			if($currentPage->MetaKeywords) {
				//Page has specific keywords
				$tags .= '<meta name="keywords" content="'. Convert::raw2att(trim($siteConfig->GlobalMetaKeyWords)) . ', ' . Convert::raw2att(trim($currentPage->MetaKeywords)) . '" />'."\n";
			} else {
				$tags .= '<meta name="keywords" content="'. Convert::raw2att($siteConfig->GlobalMetaKeyWords) . '" />'."\n";
			}
			if($currentPage->MetaDescription) {
				//Page has specific descripiton
				$tags .= '<meta name="description" content="' . Convert::raw2att($currentPage->MetaDescription) . '" />'."\n";
			} else {
				$tags .= '<meta name="description" content="' . Convert::raw2att($siteConfig->GlobalMetaDescription) . '" />'."\n";
			}
			if($currentPage->ExtraMeta) {
				$tags .= $currentPage->ExtraMeta . "\n";
			}
			return $tags;
		}
	}
?>
