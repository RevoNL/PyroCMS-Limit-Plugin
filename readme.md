# Limit Plugin

This is a simple plugin that allows you to limit text or strip the HTML tags.

## Installation

Copy the limit.php file to your addons/shared\_addons/plugins or addons/site\_ref/plugins folder.

## Usage

Parsing parameter 'text':

	{{ limit:words text='{{ news_text }}' words='20' strip='yes' }} 
	
Output:

	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Excepteur
	

Parsing tag pair content:

	{{ limit:words words="25" ending=" <a href='/read-more'>Read more</a>" }}
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
    {{ /limit:words }}

Output:

	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Excepteur sint occaecat cupidatat non proident, Read more
	
	
## Parameters

Words  -  The number of words you want to show<br>
Text  -  Limit variable and set -> Strip "yes"<br>
Ending  -  Custom ending append to the end of the text. Default = "..."<br>
Strip  -  Set "yes" to strip all HTML tags.<br>