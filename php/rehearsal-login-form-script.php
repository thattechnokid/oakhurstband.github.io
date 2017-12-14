<?php
#!/usr/local/lib/php

//*************************************************************
//  HUGGINS' Email Form Script
//  Version: V2.2.5
//  Date: 28.Sep.2013
//
//  Documentation:
//    Huggins' Email Form Script 5-01-063 V2.2.5
//
//
//  SUMMARY
//
//  This script processes form data and sends emails.
//  
//  It accepts form data as well as field and formatting 
//  specifications. It creates and sends a formatted email 
//  containing the form data. Optionally, it creates and sends 
//  containing the form data. Optionally, it creates and sends 
//  a copy back to the form user.
//
//  The script includes substantial user specified error
//  checking, substantial checking of the specifications
//  themselves, and substantial spambot prevention protocols.
//  
//  
//  COPYRIGHT AND LICENSING OF HUGGINS' Email Form Script
//  Copyright © 2005-2013 
//  by James S. Huggins & The Eclectic Power Company
//  http://www.JamesSHuggins.com
//  http://www.EclecticPower.com
//  http://www.MyEphemerae.com
//
//  Huggins’ Email Form Script is made available through the
//  Creative Commons GNU GPL License (2.0)
//
//  To view a copy of this license, visit
//  http://CreativeCommons.org/licenses/GPL/2.0 or send a
//  letter to Creative Commons,
//  543 Howard Street, 5th Floor,
//  San Francisco, California, 94105, USA.
//
//  This is a free license and permits use on
//  commercial websites. It restricts incorporation into
//  some commercial products.

//  The GNU General Public License Version 3
//  (http://www.gnu.org/licenses/gpl.html) is a
//  Free Software license
//  (see www.gnu.org/philosophy/free-sw.html). Like any
//  Free Software license, it grants to you the four
//  following freedoms:
//
//  0. The freedom to run the program for any purpose.
//  1. The freedom to study how the program works and
//     adapt it to your needs.
//  2. The freedom to redistribute copies so you can help
//     your neighbor.
//  3. The freedom to distribute copies of your modified versions to others.
//
//  The principal restrictions and conditions are:
//
//	--- You must conspicuously and appropriately publish on
//  each copy distributed an appropriate copyright notice and
//  disclaimer of warranty and keep intact all the notices that
//  refer to this License and to the absence of any warranty;
//  and give any other recipients of the Program a copy of the
//  GNU General Public License along with the Program. Any
//  translation of the GNU General Public License must be
//  accompanied by the GNU General Public License.
//
//  --- If you modify your copy or copies of the program or any
//  portion of it, or develop a program based upon it, you
//  may distribute the resulting work provided you do so under
//  the GNU General Public License. Any translation of the
//  GNU General Public License must be accompanied by the GNU
//  General Public License.
//
//  --- If you copy or distribute the program, you must
//  accompany it with the complete corresponding
//  machine-readable source code or with a written offer, valid
//  for at least three years, to furnish the complete
//  corresponding machine-readable source code.
//
//  --- IN ADDITION, <<this license>> requires specific
//  acknowledgement (a) visible on the web page where this
//  software is used and (b) within the HTML on the web page
//  where this software is used. These additional requirements
//  are fully documented in the script documentation.
//
//
//  SCRIPT DOCUMENTATION
//  
//  Script documentation is now provided externally to the 
//  script. The documentation is generally named:
//  
//      Huggins' Email Form Script 5-01-xxx V2.2.x
//      where XXX is a three digit number reflecting
//      the version of the documentation
//      and where V2.2.x represents the specific version
//      number of the script on which the documenation
//      is based.
//
//  As of 29.Sep.2013, the documentation is named:
//
//      Huggins' Email Form Script 5-01-063 V2.2.5
//      (Note that subsequent documentation may be issued even
//      though the software version does not change.)
//
//
//  COPYRIGHT AND LICENSING OF DOCUMENTATION
//
//  The documentation is licensed under the
//  Creative Commons Attribution-NonCommercial-ShareAlike License (3.0).
//
//  To view a copy of this license, visit
//  http://creativecommons.org/licenses/by-nc-sa/3.0/us/ and
//  http://creativecommons.org/licenses/by-nc-sa/3.0/us/legalcode
//  or send a letter to
//  Creative Commons,
//  543 Howard Street, 5th Floor,
//  San Francisco, California, 94105, USA.
//
//  The Creative Commons Attribution-NonCommercial-Share Alike
//  3.0 License grants to you the right to:
//
//  Share
//  to copy, distribute and transmit the work
//
//  Remix
//  to adapt the work
//
//  You are free to do these things under the following
//  conditions:
//
//  Attribution
//  You must attribute the work in the manner specified by the
//  author or licensor (but not in any way that suggests that
//  they endorse you or your use of the work).
//
//  Noncommercial
//  You may not use this work for commercial purposes.
//  (That is, you may not sell it, or sell anything you create
//  from it.)
//
//  Share Alike
//  If you alter, transform, or build upon this work, you may
//  distribute the resulting work only under the same or
//  similar license to this one.
//
//  For any reuse or distribution, you must make clear to
//  others the license terms of this work.
//
//  Any of the above conditions can be waived if you get
//  permission from the copyright holder.
//
//  Nothing in this license impairs or restricts the author's
//  moral rights.
//
//
//  SCRIPT LOCATION
//  
//  This script, documentation and other related files are 
//  available from:
//  
//      http://www.JamesSHuggins.com/huggins-email-form-script
//          or
//      http://JSH.us/hefs
//  
//  
//  COMMENTED OUT CODE
//  
//  This script may contain code which has been 
//  "commented out". These are generally "print" statements 
//  used for debugging or old code removed due to changes.
//  
//  
//  ACKNOWLEDGEMENTS 
//  
//  Tom von Alten
//  www.FortBoise.org  
//  For extensive feedback on and editing of the 
//  script documentation.
//
//  Andreas Belivanakis 
//  www.MilosIsForLovers.com 
//  For critical ideas about improving the script.
//
//  Mike Cherim
//  Green-Beast.com 
//  For ideas on protecting email forms from spambots.
//  
//  Dave Child
//  www.addedbytes.com/php/email-address-validation
//  For an algorithm I adapted to perform validation on an
//  email address. But see also
//  http://www.addedbytes.com/blog/email-address-validation-v2
//  and http://code.google.com/p/php-email-address-validation
//  for more recent info not yet used.
//
//  R. David Christman
//  www.ChristmanFamily.net
//  For encouragement and assistance with Version 2.0.1.
//
//  Tina Clarke
//  www.AccessFP.com
//  For her observations and suggestions which have helped to
//  improve the script.
//
//  Jin Cowan
//  www.jincowan.co.nz
//  Helped me improve some of my notifications and even
//  suggested the “inside the page code” notification.
//
//  Lorraine Davison 
//  www.PaulDavison.fr
//  For helping me to identify and debug an issue related to
//  passing arguments by reference
//
//  Doug DePrenger
//  www.SmartlabSoftware.com
//  Doug provided invaluable assistance helping me to
//  understand a key difference between PHP4 and PHP5, to
//  correct a problem that was affecting some users on some
//  servers and who continually provided feedback, ideas and
//  assistance.
// 
//  S. Emerson 
//  www.AccreteWebSolutions.ca  
//  For ideas about general script improvements and 
//  general support and assistance.
//
//  Stephen Fredette
//  www.ProWebsites.net  
//  For assistance with XHTML.
//
//  Pat Geary
//  www.Genealogy-Web-Creations.com 
//  For incredibly valuable and very patient assistance with
//  XHTML and also V2.1.0.
//
//  James George
//  http://gsquaredstudios.com 
//  For writing the excellent article at 
//  http://www.sitepoint.com/style-web-forms-css and for responding to 
//  my follow up question in absolutely record time. 
//
//  Lyn Harral
//  www.All-About-The-Details.com
//  For her dedication to substantial and significant
//  testing and proofreading, and for all the great
//  enhancement ideas she gave me and helped me to implement. 
//
//  Clo Knibbe
//  www.NortheastFencing.net
//  For great assistance exploring a FrontPage problem in
//  which FrontPage “corrupts” the form field names and for
//  exposure of yet one more host with crippled PHP.
//
//  Svetlana Sally Johnston
//  www.Britfeld.com
//  For working with me to implement features of V2.1.0
//  to let me test them on a “live” site and helping me to
//  see the differences between what I was trying to do and
//  what the users wanted me to do.
//
//  Al Lawrence
//  www.SunrisEDoors.com
//  For his unwavering patience as he found a major series 
//  of beta bugs, and his supportive assistance in suggesting 
//  new improvements.

//  Jonathan Lewis
//  www.LewisPhillips.com
//  For helping me improve the simple one page simple forms by
//  adding CSS and editing my XHTML. His additional templates
//  are now a part of the package.
//
//  Michelle Lyman
//  www.FromArtToZebras.com
//  For her critical assistance testing a major pre-release
//  finding the bugs I should have found in the code I
//  should have written better.
//
//  Joe Marini
//  www.sitepoint.com/article/users-email-address-php
//  For an algorithm I adapted to perform validation on an
//  email address.
//
//  Melvin D. Nava 
//  www.planet-source-code.com/vb/scripts/ShowCode.asp?txtCodEId=1316&lngWId=8
//  For a tip on using function_exists to resolve checkdnsrr
//  for WindowsServers.
//
//  Anne Nevil
//  (no website currently available)
//  For her non-stop dedication to testing the script
//  and for forcing me to see things a different way.
//  
//  Ken Rose
//  (no website currently available)
//  For alerting me (on 2010.11.13) to the need to turn off E_DEPRECATED
//  for PHP 5.3.0 
//
//  Lance W. 
//  www.cla.asn.au 
//  For assistance with timestamps.
//
//  Robert J. Walto
//  www.Walto.com
//  For identification of two problems in V2.1.1 and
//  assistance in correcting for V2.1.2.
//
//  Tammy Wolf
//  www.WolfsDesigns.com
//  For her intense tests helping me to resolve
//  Windows Servers incompatibilities.
//  
//  Jeff Zeitlin 
//  www.FreelanceTraveller.com 
//  For ideas about and testing of error page formatting.
//
//  Thomas Zuber 
//  www.ZuberPhotographics.com 
//  For spurring me on to include better support for 
//  XHTML Strict in my examples and templates, and for 
//  continued support in that effort.
//
//  All the members of Cricket’s classes and forums
//  www.GNC-Web-Creations.com/seo-optimization.htm 
//  These members enthusiastically used and tested my script, 
//  putting up with bugs and failures while I got it right. 
//  They are the best test team out there.
//
//  J. Bailey (“Cricket”)
//  www.GNC-Web-Creations.com 
//  What can I say. She has tirelessly promoted the script. 
//  But more than that, she acknowledged me, appreciated me and 
//  encouraged me throughout the process, and especially when 
//  I needed it most.
//
//  Mother and Father
//  For the genes that make me say “Someone should fix this!” 
//  and the love that lets me know I can.
//
//  
//  CHANGE HISTORY (in reverse chron order)
//
//  28.Sep.2013: V2.2.5
//  - Primarily to create a new baseline since it had been so long since the 
//    last version.
//    New baseline reclects changed inline documentation.
//    I will be working to replace the (now deprecated) ereg function call.
//
//  21.Jul.2012: V2.2.4
//  - implemented the temp/trial fix almost 2 years old 
//      disable E_DEPRECATED which is added into version
//      5.3.0 of PHP
//
//  01.Aug.2010: V2.2.3
//  - changed name of accompanying file from
//      hefs-mail-test-v2.2.3.htm.txt to
//      pqy-v2.2.3.php.txt to reduce confustion
//  -  made other minor documentation changes and corrections 
//      to improve documentation
//  -  did NOT make any significant script changes 
//
//  08.May.2009: V2.2.2
//  - Changed two invocations of error C017 to change field
//    description in the error; used to say "Minimum Value"
//    and "Maximum Value"; these were changed to
//    "Minimum Field Length" and "Maximum Field Length"
//    respectively
//  - removed debug tag of "error after normalize"
//  - changed error C005 to improve reporting of the condition
//  - adjusted license to add notice into the HTML of the
//    page the script is used on
//
//  26.Dec.2008: V2.2.1
//  - Minor text change in error message number C011 to
//      note the possible need to specify
//      PleaseForgiveMyUseOfAWindowsServer
//
//  09.Nov.2008: V2.2.0
//  - renamed the variable MsgxAddressesAndSubjectDropDown to
//      MsgxLabelSubjectAndAddressesDropDown
//    this is the only change, but it is big enough to warrant
//    moving the numbering to V2.2.0
//
//  07.Nov.2008: V2.1.2
//  - fix two problems identified by Robert Walto
//    (1) error E023 was reporting low-value instead of
//        high-value
//    (2) in checking for "OFF" within MsgxFieldNameValueSubstitutionList
//        the program was using "off" instead of OFF; correcting
//        the case solved this problem
//
//  15.Aug.2008: V2.1.1
//  - Correction of problems with MsgxAddressesAndSubject
//
//  14.Aug.2008: V2.1.0.2
//  - fix minor typo in version 2.1.0.1 that was causing error
//    in some circumstances
//
//  06.Jul.2008: V2.1.0.1
//  - fix minor typo in version 2.1.0
//    blank line without the leading "//" was causing a blank line echo
//    that created a problem; commented out the linee
//
//  05.Jul.2008: V2.1.0
//  - Production release
//
//  06.Jun.2008: V2.1.0 BETA 3
//  - Release BETA 3
//  - Change opening tag to <?php from just <?
//  - Set so that FormPleaseForgiveMyUseOfAWindowsServer
//    disables the MX Check

//  28.May.2008: V2.1.0 BETA 2
//  - Release BETA 2
//
//  26.May.2008: V2.1.0 BETA 2B (internal)
//  - Set the system to recognize
//    FormPleaseForgiveMyUseOfAWindowsServer and
//    FormCSVFileName as reserved field names
//  - Rewrite handling of message variables for subject, top
//    and bottom
//  - Rewrite handling and testing of CSS classes
//
//  31.Mar.2008: V2.1.0 BETA 2a (internal)
//  - Respond to Jason Barfknecht [Jason.Barfknecht@cfbmic.com]
//    reporting error C011 on an email address
//
//  25.Feb.2008: V2.1.0 BETA 1
//  - Allow template based formatting of error page
//  - Improve reporting of MsgxAddressesAndSubjectDropDown
//  - Redo placement of logic to assign field labels for  
//    $FormEmailConfirmationField and FormEmailField,
//
//  28.Jul.2007: V2.0.4 (not publicly released)
//  - changes to allow reporting of
//    MsgxAddressesAndSubjectDropDown
//  - fix: replacing empty()
//  - fix: make email confirmation not case sensitive
//  - change: make email confirmation not case sensitive
//
//  19.Jul.2007: V2.0.3 (not publicly released)
//  - fix: single 0 allowed as email because it is empty!!
//        fixed everywhere in v2.0.4
//
//  10.Jun.2007: V2.0.2
//  - Minor Change: adjust format of the 
//    Form Field Information 
//    Capitalize DOCTYPE
//    Add Content-Type
//
//  03.Apr.2007: V2.0.1
//  - Bug fix: Email confirmation field was being checked
//    even if it was not specified in FormEmailFieldList
//
//  02.Apr.2007: V2.0.0
//  - Release of Version 2.0.0
//
//  11.Mar.2007: 333
//  - Fix bugs discovered by Al Lawrence
//
//  10.Mar.2007: 332
//  - Start with 331, then
//  - Change all </br> to <br>
//    and add <p> to pair with </p> on error page
//    to correct HTML errors
//    (page rendered correctly in IE, but not Firefox)
//  - Changed the checkboxgroup edit to specify min and max
//    in the same spec
//
//  30.Jan.2007: 331
//  - Checkpoint of 330e
//
//  30.Jan.2007: 330e
//  - Changed CHECKBOXREQUIRED to CHECKBOXGROUP and added
//    maxpermitted and minrequired; changed spec format from
//    that used by CHECKBOXREQUIRED
//
//  28.Jan.2007: 330d
//  - added support for CHECKBOXREQUIRED
//
//  28.Jan.2007: 330c
//  - fix a couple bugs
//
//  28.Jan.2007: 330b
//  - Add functionality for indenting header labels just like
//    field labels: "`"
//  - Change PLUSLIST processing from "b" and "l" processing
//    of "requiredness", to using BLANKLINE and LABELLINE
//    and allowing variable number of sub-parms
//
//  28.Jan.2007: 330a
//  - Add functionality for indenting field labels: "`"
//
//  28.Jan.2007: 330
//  - Remove use of FormFieldNameValueSubstitutionList
//  - Major enhancements in use of PLUSLIST including
//    specification of blank lines, specification of exclude
//    variables and specification of label lines
//  - also major rework of exclude list processing and also
//    fieldnamelabellist processing
//
//  27.Jan.2007: 329
//  - Fix bug in min length / max length checking
//
//  27.Jan.2007: 328
//  - Correct errors introduced in 327 including
//    failure to initialize some msg level parameters
//
//  27.Jan.2007: 327
//  - Correct error in error message E019; was reporting
//    min possible low value instead of max possible
//    high value
//
//  26.Jan.2007: 326
//  - More fixes on backreference logic; triggered by failure
//    of exclude list; problem: using "=" instead of "=="
//    in "if" statements
//
//  26.Jan.2007: 325
//  - Major rework of min/max check
//  - Major rework of backreference logic for all variables
//
//  23.Jan.2007: 324
//  - Corrected (again) an error thought corrected in 320c: 
//    checkboxes which are not checked causing errors
//
//  20.Jan.2007: 323
//  - Corrected an error which caused the specified subject to
//    NOT be used and the default to be used instead
//
//  18.Jan.2007: 322
//  - Corrected an error which caused a failure if there was
//    NOT a confirmation email specified
//
//  16.Jan.2007: 321
//  - 321 is a copy of 320c
//
//  15.Jan.2007: 320c: Bug Fix
//  - Checkboxes were causing problems if not checked because
//    then they are not sent to the script
//
//  14.Jan.2007: 320b: Bug Fix
//  - Msg0AddrList was not being loaded correctly in Main Code
//  - in the code added for the dropdown address list
//
//  13.Jan.2007: 320a: Bug Fix
//  - FormFieldNameEditList edit failed if the field was empty;
//    added code testing for empty
//
//  13.Jan.2007: Version 2.0-PR-320,
//  Tenth release of the Version 2.0 Release Candidate
//  - Removed forced lowercasing of field names in
//    FieldNameEditList
//  - Added support for "|" as well as ","
//  - Added MsgxAddressesAndSubjectDropDown
//  - Added MsgxSubjectField
//  - Added "C" Level error checking
//  - Brought documentation up to date
//  - Synchronized the CHEF Tutorial
//  - Corrected use of checkdnsrr for Windows Servers
//    through help of Tammy Wolf 
//    (NB: still unable to get full functionality
//    on Windows Servers)
//  
//  15.Nov.2006: Version 2.0-RC1-319 
//  Ninth release of the Version 2.0 Release Candidate
//  - Changed handling of Format 1; was testing [= "blank]
//    instead of [==] 
//  - Stopped downshifting field names
//  - Corrected FormErrorFields
//    was pulling without "Form" prefix
//  - Brought documentation up to date
//  
//  13.Nov.2006: Version 2.0-RC1-318 
//  Eighth release of the Version 2.0 Release Candidate
//  - Changed handling on empty FieldNameLabelList 
//    processing to be equivalent to "*"
//  - Brought documentation up to date
//
//  04.Nov.2006: Version 2.0-RC1-317 
//  Seventh release of the Version 2.0 Release Candidate
//  - Add set of $Msg0FieldNameLabelListArrayDefault;
//    was not being set after the list was exploded
//  
//  04.Nov.2006: Version 2.0-RC1-316 
//  Sixth release of the Version 2.0 Release Candidate
//  - Added support for cond-newline in format3
//  - Fixed minor bugs as discovered during code review
//  
//  04.Nov.2006: Version 2.0-RC1-315 
//  Fifth release of the Version 2.0 Release Candidate
//  - Bug fix on using Msg1AddrList when no value is
//    supplied for EchoFromAddr
//  - MAJOR bug fix: added default population of
//    Msg0FieldNameLabelListArray
//  
//  03.Nov.2006: Version 2.0-RC1-314 
//  Fourth release of the Version 2.0 Release Candidate
//  - Bug fix regarding FormOutputFieldInfo: 
//    added a missing "<" to the output
//  - Bug fix regarding FormOutputFieldInfo, FormEchoUser,
//    FormErrorPageTrackingInfo and CopyUser: had not
//    downshifted the field on entry
//  - Added support for Format1, Format2, Format3
//
//  29.Oct.2006: Version 2.0-RC1-313 
//  Third release of the Version 2.0 Release Candidate
//  Minor enhancements including: 
//  - Made MsgEchoFromAddr optional allowing to default to
//    first address of Msg1AddrList
//  - Added 2nd optional item to FormEmailFieldList to allow
//    direct specification of the email confirmationfield
//    instead of having to use a field edit spec
//  - Changed default subject, top and bottom text for
//    echo messages
//  
//  28.Oct.2006: Version 2.0-RC1-312
//  Second release of the Version 2.0 Release Candidate
//  - Corrects error made with character accidentally deleted
//  
//  27.Oct.2006: Version 2.0-RC1-311
//  First release of the Version 2.0 Release Candidate
//  
//  12.Oct.2006: Version 1.2b, Misc Changes
//  - Relocate the changes from Version 1.2a
//  - Consolidate three changes into the start of the
//    AssembleMessage function.
//  
//  11.Oct.2006: Version 1.2a, Bug Fix,
//  If the FieldNameLabelList was empty, the code aborted
//  - Added code to check for an empty list and
//    change it to "blank,blank"
//    This fix is not "elegant", but the condition is unusual.
//    The reporting user only wanted to send a "standard" email
//    without reporting any fields.
//  
//  05.Oct.2006: Version 1.2, Changes to allow to run 
//  under PHP5
//  - Changes identified from testing Version 1.2
//  - Added more code to prevent unassigned variables    
//  
//  03.Oct.2006: Version 1.1, Changes to allow to run 
//  under PHP5, with gracious assistance from 
//      Doug DePrenger
//      Smartlab Software
//      www.SmartlabSoftware.com
//  who found the error and suggested the fix
//  - Added code to prevent unassigned variables    
//  
//*************************************************************




//*************************************************************
//  FUNCTION: JSHEmpty($Var)
//*************************************************************

function JSHEmpty($Var) {

//-------------------------------------------------------------
//  This is a replacement for the empty() function.
//  This code is adapted from
//  http://us2.php.net/manual/en/function.empty.php#74093
//-------------------------------------------------------------


    if (((is_null($Var) || rtrim($Var) == "")
            && $Var !== FALSE)
            || (is_array($Var) && empty($Var))) {
        return TRUE;
    } else {
        return FALSE;
    }

}  //  End of JSHEmpty()




//*************************************************************
//  FUNCTION: WriteFile()
//*************************************************************

function WriteFile() {  

//-------------------------------------------------------------
//  This function creates/updates the CSV file.
//-------------------------------------------------------------

global 
    $at,
    $Browser,

    $CopyUser,

    $CRLF,

    $EditCharFormatted1,

    $EditCharFormatted1,
    $EditCharPos1,
    $EditCharValue1,
    $EditEditValue1,   
    $EditEditPos1,    
    $EditFieldActualSize1,
    $EditFieldActualSize2,
    $EditFieldLabel1,
    $EditFieldLabel2,
    $EditFieldMaxSize1,
    $EditFieldMaxSize2,
    $EditFieldMinSize1,
    $EditFieldMinSize2,
    $EditFieldName1,    
    $EditFieldName2, 
    $EditFieldPos1,    
    $EditFieldPos2,    
    $EditFieldValue1,    
    $EditFieldValue2, 
    $EditLowValue,
    $EditHighValue,
    $EditParmName1,    
    $EditParmName2,
    $EditParmValue1,    
    $EditParmValue2,
    $EditParmValue3,
    $EditSubParmLabel1,
    $EditSubParm1LegalValues,
    $EditSubParmName1,
    $EditSubParmNum1,
    $EditSubParmNum2,
    $EditSubParmPos1,  
    $EditSubParmPos2,
    $EditSubParmPos3,
    $EditSubParmPos4,
    $EditSubParmValue1,    
    $EditSubParmValue2,
    $EditSubParmValue3,
    $EditSubParmValue4,
    $EditTestValue,

    $ErrorMessagEC,
    $ErrorMessageSpam,
    $ErrorNumber,
    $ErrorPrefix,
    $ErrorSequenceNumber,
    $ErrorSuffix,
    $ErrorsWritten,

    $FormCSVFileName,
    $FormEchoUser,
    $FormEmail,
    $FormEmailConfirmation,
    $FormEmailConfirmationField,
    $FormEmailConfirmationFieldLabel,
    $FormEmailField,
    $FormEmailFieldLabel,
    $FormEmailFieldList,

    $FormErrorPagECSSClassCount,
    $FormErrorPageErrorMsgClass,
    $FormErrorPageErrorMsgColor,
    $FormErrorPageErrorMsgFace,
    $FormErrorPageErrorMsgSize,
    $FormErrorPagEFooterClass,
    $FormErrorPagEFooterColor,
    $FormErrorPagEFooterFace,
    $FormErrorPagEFooterSize,
    $FormErrorPagEHeading1,
    $FormErrorPageHeading1Bold,
    $FormErrorPageHeading1Class,
    $FormErrorPageHeading1Color,
    $FormErrorPageHeading1Face,
    $FormErrorPageHeading1Size,
    $FormErrorPageHeading2,
    $FormErrorPageHeading2Bold,
    $FormErrorPageHeading2Class,
    $FormErrorPageHeading2Color,
    $FormErrorPageHeading2Face,
    $FormErrorPageHeading2Size,
    $FormErrorPageLastCSSClassField,
    $FormErrorPageLastFormatField,
    $FormErrorPageLinEClosing,
    $FormErrorPageLinEClosingBold,
    $FormErrorPageLinEClosingClass,
    $FormErrorPageLinEClosingColor,
    $FormErrorPageLinEClosingFace,
    $FormErrorPageLinEClosingSize,
    $FormErrorPageLineOpening,
    $FormErrorPageLineOpeningBold,
    $FormErrorPageLineOpeningClass,
    $FormErrorPageLineOpeningColor,
    $FormErrorPageLineOpeningFace,    
    $FormErrorPageLineOpeningSize,
    $FormErrorPageTemplate,
    $FormErrorPageTemplatEContents,
    $FormErrorPageTitle,
    $FormErrorPageTrackingInfo,

    $FormFieldNameEditList,
    $FormFieldNameEditListArray,
    $FormFieldNameExcludEArray,
    $FormFieldNameLabelArray,
    $FormFieldNameLabelListArray,
    $FormFieldNameLabelPlusList,
    $FormFieldNameLabelPlusListArray,
    $FormFieldNameMinSizEArray,
    $FormFieldNameMaxSizEArray,
    $FormFieldNameRequiredArray,
    $FormName,
    $FormNamEField,
    $FormNameFieldList,
    $FormNextURL,
    $FormOutputFieldInfo,
    $FormPleaseForgiveMyUseOfAWindowsServer,
    $FormTestEmailDomain,
    $FormTestEmailFormat,
    $FormTestFieldMinLengths,
    $FormTestFieldMaxLengths,
    $FormTestInjectionExploits,

    $HoldMsg1AddrList,
    $HoldMsg1Subject,

    $HoldMsg2AddrList,
    $HoldMsg2Subject,

    $IP,
    $Message, 

    $Msg0AddrList,
    $Msg0DefaultFromAddr,
    $Msg0FieldLabelValueSeparator, 
    $Msg0FieldNameExcludEArray,
    $Msg0FieldNameExcludeListArray,
    $Msg0FieldNameLabelList,
    $Msg0FieldNameLabelListArray,
    $Msg0FieldNameLabelListArrayDefault,
    $Msg0FieldNameValueSubstitutionArray,
    $Msg0FieldNameValueSubstitutionList,
    $Msg0FieldValueTerminator,
    $Msg0ForcEDefaultFromAddr,
    $Msg0Subject,
    $Msg0TextBottom,
    $Msg0TextTop,

    $Msg1LabelSubjectAndAddressesDropDown,
    $Msg1AddrList,
    $Msg1AddrListAndSubjectSetByDropDown,
    $Msg1DefaultFromAddr,
    $Msg1FieldLabelValueSeparator,
    $Msg1FieldNameExcludeList,
    $Msg1FieldNameExcludeListArray,
    $Msg1FieldNameLabelList,
    $Msg1FieldNameLabelListArray,
    $Msg1FieldNameValueSubstitutionArray,
    $Msg1FieldNameValueSubstitutionList,
    $Msg1FieldNameValueSubstitutionList2,
    $Msg1ForcEDefaultFromAddr,
    $Msg1Subject,
    $Msg1SubjectField,
    $Msg1TextBottom,
    $Msg1TextTop,

    $Msg2LabelSubjectAndAddressesDropDown,
    $Msg2AddrList,
    $Msg2AddrListAndSubjectSetByDropDown,
    $Msg2DefaultFromAddr,
    $Msg2FieldLabelValueSeparator,
    $Msg2FieldNameExcludeList,
    $Msg2FieldNameExcludeListArray,
    $Msg2FieldNameLabelList,
    $Msg2FieldNameLabelListArray,
    $Msg2FieldNameValueSubstitutionArray,
    $Msg2FieldNameValueSubstitutionList,
    $Msg2FieldNameValueSubstitutionList2,
    $Msg2ForcEDefaultFromAddr,
    $Msg2Subject,
    $Msg2SubjectField,
    $Msg2TextBottom,
    $Msg2TextTop,

    $MsgEchoAddressee,
    $MsgEchoFromAddr,
    $MsgEchoFieldLabelValueSeparator,
    $MsgEchoFieldNameExcludeList,
    $MsgEchoFieldNameExcludeListArray,
    $MsgEchoFieldNameLabelList,
    $MsgEchoFieldNameLabelListArray,
    $MsgEchoFieldNameValueSubstitutionArray,
    $MsgEchoFieldNameValueSubstitutionList,
    $MsgEchoFieldNameValueSubstitutionLists,
    $MsgEchoSubject,
    $MsgEchoTextBottom,
    $MsgEchoTextTop,

    $MsgNumber,

    $NextURL,
    $PHPVersion,
    $Referer,
    $ProcessFormFieldNameLabelPlusListDone,
    $ScriptPathShort,
    $ScriptPathLong,
    $ScriptStartTime,    
    $ScriptVersion,
    $TemplateErrorPlacementString,
    $ValidFieldEditsArray;

if (JSHEmpty($FormCSVFileName)) {
    return;
}

if (file_exists($FormCSVFileName)) {
    $FilEAlreadyExists = TRUE;
} else {
    $FilEAlreadyExists = FALSE;
}

$Handle = fopen($FormCSVFileName, "at");

$Names  = array();
$RevisedLabels = array();
$Values = array();

foreach ($FormFieldNameLabelArray as $VarName => $VarLabel) {

    if (substr($VarName, 0, 5) == "blank" or
        substr($VarName, 0, 5) == "label") {
        $A = "a";
    } else {    

        $Names  [$VarName] = $VarName;
        $RevisedLabels [$VarName] = $VarLabel;

        if ($VarName == "scriptversion") {
            $Values [$VarName] = $ScriptVersion; 
        } elseif ($VarName == "phpversion") {
           $Values [$VarName] = $PHPVersion; 
        } elseif ($VarName == "scriptstarttime") {
            $Values [$VarName] = $ScriptStartTime; 
        } elseif ($VarName == "scriptpathshort") {
            $Values [$VarName] = $ScriptPathShort; 
        } elseif ($VarName == "scriptpathshort") {
            $Values [$VarName] = $ScriptPathShort; 
        } elseif ($VarName == "scriptpathlong") {
            $Values [$VarName] = $ScriptPathLong; 
        } elseif ($VarName == "browser") {
            $Values [$VarName] = $Browser; 
        } elseif ($VarName == "ip") {
            $Values [$VarName] = $IP; 
        } elseif ($VarName == "referer") {
            $Values [$VarName] = $Referer; 
        } else {
           $Temp1 = trim(stripslashes(strip_tags($_POST[$VarName])));
           $Values [$VarName] = $Temp1;
           $TestKey = "$VarName+$Temp1";
           if (!JSHEmpty($Msg1FieldNameValueSubstitutionArray [$TestKey])) {
               $Values [$VarName] = $Msg1FieldNameValueSubstitutionArray [$TestKey];
           }
        }
    }
}

if (!$FilEAlreadyExists) {
    fputcsv ($Handle, $Names);
    fputcsv ($Handle, $RevisedLabels);
}
    
fputcsv ($Handle, $Values);

fclose($Handle);

}  //  End of WriteFile()




//*************************************************************
//  FUNCTION: StartErrorPage()
//*************************************************************

function StartErrorPage() {

//-------------------------------------------------------------
//  Start the error page.
//-------------------------------------------------------------

global
    $at,
    $Browser,

    $CopyUser,

    $CRLF,

    $EditCharFormatted1,
    $EditCharPos1,
    $EditCharValue1,
    $EditEditValue1,   
    $EditEditPos1,    
    $EditFieldActualSize1,
    $EditFieldActualSize2,
    $EditFieldLabel1,
    $EditFieldLabel2,
    $EditFieldMaxSize1,
    $EditFieldMaxSize2,
    $EditFieldMinSize1,
    $EditFieldMinSize2,
    $EditFieldName1,    
    $EditFieldName2, 
    $EditFieldPos1,    
    $EditFieldPos2,    
    $EditFieldValue1,    
    $EditFieldValue2, 
    $EditLowValue,
    $EditHighValue,
    $EditParmName1,    
    $EditParmName2,
    $EditParmValue1,    
    $EditParmValue2,
    $EditParmValue3,
    $EditSubParmLabel1,
    $EditSubParm1LegalValues,
    $EditSubParmName1,
    $EditSubParmNum1,
    $EditSubParmNum2,
    $EditSubParmPos1,  
    $EditSubParmPos2,
    $EditSubParmPos3,
    $EditSubParmPos4,
    $EditSubParmValue1,    
    $EditSubParmValue2,
    $EditSubParmValue3,
    $EditSubParmValue4,
    $EditTestValue,

    $ErrorMessagEC,
    $ErrorMessageSpam,
    $ErrorNumber,
    $ErrorPrefix,
    $ErrorSequenceNumber,
    $ErrorSuffix,
    $ErrorsWritten,

    $FormCSVFileName,
    $FormEchoUser,
    $FormEmail,
    $FormEmailConfirmation,
    $FormEmailConfirmationField,
    $FormEmailConfirmationFieldLabel,
    $FormEmailField,
    $FormEmailFieldLabel,
    $FormEmailFieldList,

    $FormErrorPageCSSClassCount,
    $FormErrorPageErrorMsgClass,
    $FormErrorPageErrorMsgColor,
    $FormErrorPageErrorMsgFace,
    $FormErrorPageErrorMsgSize,
    $FormErrorPageFooterClass,
    $FormErrorPageFooterColor,
    $FormErrorPageFooterFace,
    $FormErrorPageFooterSize,
    $FormErrorPageHeading1,
    $FormErrorPageHeading1Bold,
    $FormErrorPageHeading1Class,
    $FormErrorPageHeading1Color,
    $FormErrorPageHeading1Face,
    $FormErrorPageHeading1Size,
    $FormErrorPageHeading2,
    $FormErrorPageHeading2Bold,
    $FormErrorPageHeading2Class,
    $FormErrorPageHeading2Color,
    $FormErrorPageHeading2Face,
    $FormErrorPageHeading2Size,
    $FormErrorPageLastCSSClassField,
    $FormErrorPageLastFormatField,
    $FormErrorPageLinEClosing,
    $FormErrorPageLinEClosingBold,
    $FormErrorPageLinEClosingClass,
    $FormErrorPageLinEClosingColor,
    $FormErrorPageLinEClosingFace,
    $FormErrorPageLinEClosingSize,
    $FormErrorPageLineOpening,
    $FormErrorPageLineOpeningBold,
    $FormErrorPageLineOpeningClass,
    $FormErrorPageLineOpeningColor,
    $FormErrorPageLineOpeningFace,    
    $FormErrorPageLineOpeningSize,
    $FormErrorPageTemplate,
    $FormErrorPageTemplateContents,
    $FormErrorPageTitle,
    $FormErrorPageTrackingInfo,

    $FormFieldNameEditList,
    $FormFieldNameEditListArray,
    $FormFieldNameExcludEArray,
    $FormFieldNameLabelArray,
    $FormFieldNameLabelListArray,
    $FormFieldNameLabelPlusList,
    $FormFieldNameLabelPlusListArray,
    $FormFieldNameMinSizEArray,
    $FormFieldNameMaxSizEArray,
    $FormFieldNameRequiredArray,
    $FormName,
    $FormNamEField,
    $FormNameFieldList,
    $FormNextURL,
    $FormOutputFieldInfo,
    $FormPleaseForgiveMyUseOfAWindowsServer,
    $FormTestEmailDomain,
    $FormTestEmailFormat,
    $FormTestFieldMinLengths,
    $FormTestFieldMaxLengths,
    $FormTestInjectionExploits,

    $HoldMsg1AddrList,
    $HoldMsg1Subject,

    $HoldMsg2AddrList,
    $HoldMsg2Subject,

    $IP,
    $Message, 

    $Msg0AddrList,
    $Msg0DefaultFromAddr,
    $Msg0FieldLabelValueSeparator, 
    $Msg0FieldNameExcludEArray,
    $Msg0FieldNameExcludeListArray,
    $Msg0FieldNameLabelList,
    $Msg0FieldNameLabelListArray,
    $Msg0FieldNameLabelListArrayDefault,
    $Msg0FieldNameValueSubstitutionArray,
    $Msg0FieldNameValueSubstitutionList,
    $Msg0FieldValueTerminator,
    $Msg0ForcEDefaultFromAddr,
    $Msg0Subject,
    $Msg0TextBottom,
    $Msg0TextTop,

    $Msg1LabelSubjectAndAddressesDropDown,
    $Msg1AddrList,
    $Msg1AddrListAndSubjectSetByDropDown,
    $Msg1DefaultFromAddr,
    $Msg1FieldLabelValueSeparator,
    $Msg1FieldNameExcludeList,
    $Msg1FieldNameExcludeListArray,
    $Msg1FieldNameLabelList,
    $Msg1FieldNameLabelListArray,
    $Msg1FieldNameValueSubstitutionArray,
    $Msg1FieldNameValueSubstitutionList,
    $Msg1FieldNameValueSubstitutionList2,
    $Msg1ForcEDefaultFromAddr,
    $Msg1Subject,
    $Msg1SubjectField,
    $Msg1TextBottom,
    $Msg1TextTop,

    $Msg2LabelSubjectAndAddressesDropDown,
    $Msg2AddrList,
    $Msg2AddrListAndSubjectSetByDropDown,
    $Msg2DefaultFromAddr,
    $Msg2FieldLabelValueSeparator,
    $Msg2FieldNameExcludeList,
    $Msg2FieldNameExcludeListArray,
    $Msg2FieldNameLabelList,
    $Msg2FieldNameLabelListArray,
    $Msg2FieldNameValueSubstitutionArray,
    $Msg2FieldNameValueSubstitutionList,
    $Msg2FieldNameValueSubstitutionList2,
    $Msg2ForcEDefaultFromAddr,
    $Msg2Subject,
    $Msg2SubjectField,
    $Msg2TextBottom,
    $Msg2TextTop,

    $MsgEchoAddressee,
    $MsgEchoFromAddr,
    $MsgEchoFieldLabelValueSeparator,
    $MsgEchoFieldNameExcludeList,
    $MsgEchoFieldNameExcludeListArray,
    $MsgEchoFieldNameLabelList,
    $MsgEchoFieldNameLabelListArray,
    $MsgEchoFieldNameValueSubstitutionArray,
    $MsgEchoFieldNameValueSubstitutionList,
    $MsgEchoFieldNameValueSubstitutionLists,
    $MsgEchoSubject,
    $MsgEchoTextBottom,
    $MsgEchoTextTop,

    $MsgNumber,

    $NextURL,
    $PHPVersion,
    $Referer,
    $ProcessFormFieldNameLabelPlusListDone,
    $ScriptPathShort,
    $ScriptPathLong,
    $ScriptStartTime,    
    $ScriptVersion,
    $TemplateErrorPlacementString,
    $ValidFieldEditsArray;

if ($ErrorsWritten) {
    return;
} else {
    $ErrorsWritten = TRUE;
}

if (JSHEmpty($FormErrorPageTemplateContents)) {
    OutputPageHead ($FormErrorPageTitle, "This is an error page generated by Huggins' Email Form Script. See http://www.JamesSHuggins.com/hefs");
} else {
   $Pos1 = strpos($FormErrorPageTemplateContents, $TemplateErrorPlacementString);
}
   
//  TEST MARKER
//  echo "Test Marker 2", "<br>";
//  echo $Pos1, "<br>";
//  echo "<br>","<br>";

echo substr($FormErrorPageTemplateContents, 0, $Pos1);

if ($FormErrorPageHeading1Bold == "yes") {
    $FormErrorPageHeading1Bold1 = "<b>";
    $FormErrorPageHeading1Bold2 = "</b>";
} else {
    $FormErrorPageHeading1Bold1 = "";
    $FormErrorPageHeading1Bold2 = "";
}

if ($FormErrorPageHeading2Bold == "yes") {
    $FormErrorPageHeading2Bold1 = "<b>";
    $FormErrorPageHeading2Bold2 = "</b>";
} else {
    $FormErrorPageHeading2Bold1 = "";
    $FormErrorPageHeading2Bold2 = "";
}

if ($FormErrorPageLineOpeningBold == "yes") {
    $FormErrorPageLineOpeningBold1 = "<b>";
    $FormErrorPageLineOpeningBold2 = "</b>";
} else {
    $FormErrorPageLineOpeningBold1 = "";
    $FormErrorPageLineOpeningBold2 = "";
}

if (!JSHEmpty($FormErrorPageHeading1Class)) {
    echo "<p class=\"$FormErrorPageHeading1Class\">$FormErrorPageHeading1</p>$CRLF";
} else {
    echo "<p><font face=\"$FormErrorPageHeading1Face\" size=\"$FormErrorPageHeading1Size\" color=\"$FormErrorPageHeading1Color\">$FormErrorPageHeading1Bold1$FormErrorPageHeading1$FormErrorPageHeading1Bold2</font><br>$CRLF";
}

if (!JSHEmpty($FormErrorPageHeading2Class)) {
    echo "<p class=\"$FormErrorPageHeading2Class\">$FormErrorPageHeading2</p>$CRLF";
} else {
    echo "<p><font face=\"$FormErrorPageHeading2Face\" size=\"$FormErrorPageHeading2Size\" color=\"$FormErrorPageHeading2Color\">$FormErrorPageHeading2Bold1$FormErrorPageHeading2$FormErrorPageHeading2Bold2</font><br>$CRLF";
}

if (!JSHEmpty($FormErrorPageLineOpeningClass)) {
    echo "<p class=\"$FormErrorPageLineOpeningClass\">$FormErrorPageLineOpening</p>$CRLF";
} else {
    echo "<p><font face=\"$FormErrorPageLineOpeningFace\" size=\"$FormErrorPageLineOpeningSize\" color=\"$FormErrorPageLineOpeningColor\">$FormErrorPageLineOpeningBold1$FormErrorPageLineOpening$FormErrorPageLineOpeningBold2</font></p>$CRLF";
}

}  //  End of StartErrorPage()




//*************************************************************
//  FUNCTION: WriteErrorMessage($ErrorCode)
//*************************************************************

function WriteErrorMessage($ErrorCode) {

//-------------------------------------------------------------
//  Write the error message.
//-------------------------------------------------------------

global 
    $at,
    $Browser,

    $CopyUser,

    $CRLF,

    $EditCharFormatted1,
    $EditCharPos1,
    $EditCharValue1,
    $EditEditValue1,   
    $EditEditPos1,    
    $EditFieldActualSize1,
    $EditFieldActualSize2,
    $EditFieldLabel1,
    $EditFieldLabel2,
    $EditFieldMaxSize1,
    $EditFieldMaxSize2,
    $EditFieldMinSize1,
    $EditFieldMinSize2,
    $EditFieldName1,    
    $EditFieldName2, 
    $EditFieldPos1,    
    $EditFieldPos2,    
    $EditFieldValue1,    
    $EditFieldValue2, 
    $EditLowValue,
    $EditHighValue,
    $EditParmName1,    
    $EditParmName2,
    $EditParmValue1,    
    $EditParmValue2,
    $EditParmValue3,
    $EditSubParmLabel1,
    $EditSubParm1LegalValues,
    $EditSubParmName1,
    $EditSubParmNum1,
    $EditSubParmNum2,
    $EditSubParmPos1,  
    $EditSubParmPos2,
    $EditSubParmPos3,
    $EditSubParmPos4,
    $EditSubParmValue1,    
    $EditSubParmValue2,
    $EditSubParmValue3,
    $EditSubParmValue4,
    $EditTestValue,

    $ErrorMessagEC,
    $ErrorMessageSpam,
    $ErrorNumber,
    $ErrorPrefix,
    $ErrorSequenceNumber,
    $ErrorSuffix,
    $ErrorsWritten,

    $FormCSVFileName,
    $FormEchoUser,
    $FormEmail,
    $FormEmailConfirmation,
    $FormEmailConfirmationField,
    $FormEmailConfirmationFieldLabel,
    $FormEmailField,
    $FormEmailFieldLabel,
    $FormEmailFieldList,

    $FormErrorPageCSSClassCount,
    $FormErrorPageErrorMsgClass,
    $FormErrorPageErrorMsgColor,
    $FormErrorPageErrorMsgFace,
    $FormErrorPageErrorMsgSize,
    $FormErrorPageFooterClass,
    $FormErrorPageFooterColor,
    $FormErrorPageFooterFace,
    $FormErrorPageFooterSize,
    $FormErrorPageHeading1,
    $FormErrorPageHeading1Bold,
    $FormErrorPageHeading1Class,
    $FormErrorPageHeading1Color,
    $FormErrorPageHeading1Face,
    $FormErrorPageHeading1Size,
    $FormErrorPageHeading2,
    $FormErrorPageHeading2Bold,
    $FormErrorPageHeading2Class,
    $FormErrorPageHeading2Color,
    $FormErrorPageHeading2Face,
    $FormErrorPageHeading2Size,
    $FormErrorPageLastCSSClassField,
    $FormErrorPageLastFormatField,
    $FormErrorPageLinEClosing,
    $FormErrorPageLinEClosingBold,
    $FormErrorPageLinEClosingClass,
    $FormErrorPageLinEClosingColor,
    $FormErrorPageLinEClosingFace,
    $FormErrorPageLinEClosingSize,
    $FormErrorPageLineOpening,
    $FormErrorPageLineOpeningBold,
    $FormErrorPageLineOpeningClass,
    $FormErrorPageLineOpeningColor,
    $FormErrorPageLineOpeningFace,    
    $FormErrorPageLineOpeningSize,
    $FormErrorPageTemplate,
    $FormErrorPageTemplateContents,
    $FormErrorPageTitle,
    $FormErrorPageTrackingInfo,

    $FormFieldNameEditList,
    $FormFieldNameEditListArray,
    $FormFieldNameExcludEArray,
    $FormFieldNameLabelArray,
    $FormFieldNameLabelListArray,
    $FormFieldNameLabelPlusList,
    $FormFieldNameLabelPlusListArray,
    $FormFieldNameMinSizEArray,
    $FormFieldNameMaxSizEArray,
    $FormFieldNameRequiredArray,
    $FormName,
    $FormNamEField,
    $FormNameFieldList,
    $FormNextURL,
    $FormOutputFieldInfo,
    $FormPleaseForgiveMyUseOfAWindowsServer,
    $FormTestEmailDomain,
    $FormTestEmailFormat,
    $FormTestFieldMinLengths,
    $FormTestFieldMaxLengths,
    $FormTestInjectionExploits,

    $HoldMsg1AddrList,
    $HoldMsg1Subject,

    $HoldMsg2AddrList,
    $HoldMsg2Subject,

    $IP,
    $Message, 

    $Msg0AddrList,
    $Msg0DefaultFromAddr,
    $Msg0FieldLabelValueSeparator, 
    $Msg0FieldNameExcludEArray,
    $Msg0FieldNameExcludeListArray,
    $Msg0FieldNameLabelList,
    $Msg0FieldNameLabelListArray,
    $Msg0FieldNameLabelListArrayDefault,
    $Msg0FieldNameValueSubstitutionArray,
    $Msg0FieldNameValueSubstitutionList,
    $Msg0FieldValueTerminator,
    $Msg0ForcEDefaultFromAddr,
    $Msg0Subject,
    $Msg0TextBottom,
    $Msg0TextTop,

    $Msg1LabelSubjectAndAddressesDropDown,
    $Msg1AddrList,
    $Msg1AddrListAndSubjectSetByDropDown,
    $Msg1DefaultFromAddr,
    $Msg1FieldLabelValueSeparator,
    $Msg1FieldNameExcludeList,
    $Msg1FieldNameExcludeListArray,
    $Msg1FieldNameLabelList,
    $Msg1FieldNameLabelListArray,
    $Msg1FieldNameValueSubstitutionArray,
    $Msg1FieldNameValueSubstitutionList,
    $Msg1FieldNameValueSubstitutionList2,
    $Msg1ForcEDefaultFromAddr,
    $Msg1Subject,
    $Msg1SubjectField,
    $Msg1TextBottom,
    $Msg1TextTop,

    $Msg2LabelSubjectAndAddressesDropDown,
    $Msg2AddrList,
    $Msg2AddrListAndSubjectSetByDropDown,
    $Msg2DefaultFromAddr,
    $Msg2FieldLabelValueSeparator,
    $Msg2FieldNameExcludeList,
    $Msg2FieldNameExcludeListArray,
    $Msg2FieldNameLabelList,
    $Msg2FieldNameLabelListArray,
    $Msg2FieldNameValueSubstitutionArray,
    $Msg2FieldNameValueSubstitutionList,
    $Msg2FieldNameValueSubstitutionList2,
    $Msg2ForcEDefaultFromAddr,
    $Msg2Subject,
    $Msg2SubjectField,
    $Msg2TextBottom,
    $Msg2TextTop,

    $MsgEchoAddressee,
    $MsgEchoFromAddr,
    $MsgEchoFieldLabelValueSeparator,
    $MsgEchoFieldNameExcludeList,
    $MsgEchoFieldNameExcludeListArray,
    $MsgEchoFieldNameLabelList,
    $MsgEchoFieldNameLabelListArray,
    $MsgEchoFieldNameValueSubstitutionArray,
    $MsgEchoFieldNameValueSubstitutionList,
    $MsgEchoFieldNameValueSubstitutionLists,
    $MsgEchoSubject,
    $MsgEchoTextBottom,
    $MsgEchoTextTop,

    $MsgNumber,

    $NextURL,
    $PHPVersion,
    $Referer,
    $ProcessFormFieldNameLabelPlusListDone,
    $ScriptPathShort,
    $ScriptPathLong,
    $ScriptStartTime,    
    $ScriptVersion,
    $TemplateErrorPlacementString,
    $ValidFieldEditsArray;

StartErrorPage();

if (substr($EditFieldLabel1, 0, 1) == "`") {
    $EditFieldLabel1 = trim(substr($EditFieldLabel1, 1));
}

if (substr($EditFieldLabel2, 0, 1) == "`") {
    $EditFieldLabel2 = trim(substr($EditFieldLabel2, 1));
}

//$ErrorSequenceNumber = $ErrorSequenceNumber + 1;
//
//if (!JSHEmpty($FormErrorPageErrorMsgClass)) {
//    $ErrorPrefix = "<p class=\"$FormErrorPageErrorMsgClass\"><b>Error Number: $ErrorSequenceNumber</b><br>";
//} else {
//    $ErrorPrefix = "<p><font face=\"$FormErrorPageErrorMsgFace\" size=\"$FormErrorPageErrorMsgSize\" color=\"$FormErrorPageErrorMsgColor\"><b>Error Number: $ErrorSequenceNumber</b><br>";
//}

if (!JSHEmpty($FormErrorPageErrorMsgClass)) {
    $ErrorSuffix = "</p>" . $CRLF;
} else {
    $ErrorSuffix = "</font><br>&nbsp</p>" . $CRLF;
}



//  FORM ENTRY ERRORS -----------------------------------------


if ($ErrorCode == "E001") {

//  E001: Pseudo-Captcha Error

    $ErrorMessage = 
        "The field named <b>$EditFieldLabel1</b> (\"$EditFieldValue1\") is an anti-spam field, but <b><i>does not contain the \"correct answer\"</i></b>. You must enter the \"correct answer\" for the system to process your form. $ErrorMessageSpam (E001)";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;


} elseif ($ErrorCode == "E002") {

//  E002: Missing Required Field

    $ErrorMessage = 
        "The field named <b>$EditFieldLabel1</b> is a <b><i>required field</i></b> but you <b><i>did not enter a value</i></b>. You must enter a value in this field. (E002)";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;


} elseif ($ErrorCode == "E003") {

//  E003: Too Much Data Entered

    $ErrorMessage = 
        "The field named <b>$EditFieldLabel1</b> (\"$EditFieldValue1\") has too much information in it. It is \"too long\". You <b><i>entered too much information --- too many characters.</i></b> <i>In theory, if the webmaster configured the form correctly, you should not be able to get this error. This error should occur when spambots try to stuff values into fields to hijack the form/script.</i> If you are not a spambot, please type less. Do not enter more than $EditFieldMaxSize1 characters. Also, please contact the webmaster to correct the form. (E003)";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;


} elseif ($ErrorCode == "E004") {

//  E004: Not Enough Data Entered

    $ErrorMessage = 
        "The field named <b>$EditFieldLabel1</b> (\"$EditFieldValue1\") does not have enough information in it. It is \"too short\". You <b><i>did not enter enough information --- not enough characters.</i></b> You must enter at least $EditFieldMinSize1 characters into this field. (E004)";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;


} elseif ($ErrorCode == "E005") {

//  E005: Illegal Email Addr – Wrong Number of Characters or “@”

    $ErrorMessage = 
        "The field named <b>$EditFieldLabel1</b> (\"$EditFieldValue1\") is not a valid email address either because it has the <b><i>wrong number of characters in one section or the wrong number of @ symbols</i></b>. You must enter a valid email address into this field. (E005)";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;


} elseif ($ErrorCode == "E006") {

//  E006: Illegal Email Addr – Incorrect Local Address Part

    $ErrorMessage = 
        "The field named <b>$EditFieldLabel1</b> (\"$EditFieldValue1\") contains an <b><i>illegal email address</i></b>. The email address is illegal because the <b><i>local address part before the @-sign (\"$EditFieldValue2\") is invalid</i></b>. You must enter a valid email address into this field. (E006)";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;


} elseif ($ErrorCode == "E007") {

//  E007: Illegal Email Addr – Not Enough Parts in Domain Name

    $ErrorMessage = 
        "The field named <b>$EditFieldLabel1</b> (\"$EditFieldValue1\") contains an <b><i>illegal email address</i></b>. The email address is illegal because there are <b><i>not enough \"parts\" in the domain name (\"$EditFieldValue2\")</i></b>. You must enter a valid email address into this field. (E007)";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;


} elseif ($ErrorCode == "E008") {

//  E008: Illegal Email Addr – Domain Name Built Wrong

    $ErrorMessage = 
        "The field named <b>$EditFieldLabel1</b> (\"$EditFieldValue1\") contains an <b><i>illegal email address</i></b>. The email address is illegal because the <b><i>domain name (\"$EditFieldValue2\") contains illegal characters or is built wrong</i></b>. You must enter a valid email address into this field. (E008)";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;


} elseif ($ErrorCode == "E009") {

//  E009: Illegal Email Addr – Domain Name Doesn’t Exist or Can’t Receive Email

    $ErrorMessage = 
        "The field named <b>$EditFieldLabel1</b> (\"$EditFieldValue1\") contains an <b><i>illegal email address</i></b>. The email address is illegal because, <b><i>either the domain name (\"$EditFieldValue2\") does not exist, or it is not set up to receive email</i></b>. You must enter a valid email address into this field. (E009)";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;


} elseif ($ErrorCode == "E010") {

//  E010: Injection Exploit

    $ErrorMessage = 
        "The field named <b>$EditFieldLabel1</b> (\"$EditFieldValue1\") contains <b><i>illegal content</b></i>. Such illegal content may be an <b><i>injection exploit</i></b>. When a spambot places \"<i>content-type</i>\", \"<i>bcc:</i>\", \"<i>cc:</i>\", \"<i>document.cookie</i>\", \"<i>onclick</i>\", or \"<i>onload</i>\" in a field this is called an \"injection exploit\". <i>Placing these values in a field is one way spambots hijack the form/script to send spam.<i> If you have placed one of these codes in any field, you must find another way to send this information. Type your information without using one of these codes. (E010)";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;


} elseif ($ErrorCode == "E011") {

//  E011: Email Address Does Not Match Confirmation

    $ErrorMessage = 
        "The field named <b>$EditFieldLabel1</b> (\"$EditFieldValue1\") contains an email address that <b><i>does not match the confirmation email address</i></b> you entered in <b>$EditFieldLabel2</b> (\"$EditFieldValue2\"). You must enter matching values into these two fields.(E011)";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;


} elseif ($ErrorCode == "E012") {

//  E012: Field Value Does Not Match Confirmation

    $ErrorMessage = 
        "The field named <b>$EditFieldLabel1</b> (\"$EditFieldValue1\") contains a value that <b><i>does not match the confirmation value</i></b> you entered in <b>$EditFieldLabel2</b> (\"$EditFieldValue2\"). You must enter matching values into these two fields. (E012)";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;


} elseif ($ErrorCode == "E013") {

//  E013: No Value Selected in Drop Down List

    $ErrorMessage = 
        "For the drop down list named <b>$EditFieldLabel1</b>, <b><i>no value was selected</i></b>. (The value still shows as \"$EditFieldValue1\".) You must select a value in this drop down list. $ErrorMessageSpam (E013)";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;


} elseif ($ErrorCode == "E014") {

//  E014: Field Not Left Empty

    $ErrorMessage = 
        "The field named <b>$EditFieldLabel1</b> (\"$EditFieldValue1\") <b><i>is not empty</i></b>. You must leave this field empty. $ErrorMessageSpam (E014)";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;


} elseif ($ErrorCode == "E015") {

//  E015: Field Does Not Match Permitted Values

    $ErrorMessage = 
        "The field named <b>$EditFieldLabel1</b> (\"$EditFieldValue1\") <b><i>does not contain any of the permitted values</b></i>. You must correct your entry to match a permitted value. (E015)";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;


} elseif ($ErrorCode == "E016") {

//  E016: Field Matches a Prohibited Value

    $ErrorMessage = 
        "The field named <b>$EditFieldLabel1</b> (\"$EditFieldValue1\") <b><i>matched one of the prohibited values</i></b>. You must correct your entry to not match a prohibited value. (E016)";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;


} elseif ($ErrorCode == "E017") {

//  E017: Integer Contains Illegal Character

    $ErrorMessage = 
        "The field named <b>$EditFieldLabel1</b> (\"$EditFieldValue1\") should contain an integer but <b><i>contains an illegal character ($EditCharFormatted1) in position #$EditCharPos1</i></b>. You must enter a legal integer for this field. (E017)";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;


} elseif ($ErrorCode == "E018") {

//  E018: Integer Has Too Low a Value

    $ErrorMessage = 
        "The field named <b>$EditFieldLabel1</b> (\"$EditFieldValue1\") has <b><i>too low a value</i></b> ($EditTestValue). You must enter an integer and the lowest possible value is $EditLowValue. (E018)";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;


} elseif ($ErrorCode == "E019") {

//  E019: Integer Has Too High a Value

    $ErrorMessage = 
        "The field named <b>$EditFieldLabel1</b> (\"$EditFieldValue1\") has <b><i>too high a value</i></b> ($EditTestValue). You must enter an integer and the highest possible value is $EditHighValue. (E019)";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;


} elseif ($ErrorCode == "E020") {

//  E020: Number Contains Illegal Character

    $ErrorMessage = 
        "The field named <b>$EditFieldLabel1</b> (\"$EditFieldValue1\") should contain a number but <b><i>contains an illegal character ($EditCharFormatted1) in position #$EditCharPos1</i></b>. You must enter a legal number for this field. (E020)";    
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;


} elseif ($ErrorCode == "E021") {

//  E021: Too Many Periods in a Number

    $ErrorMessage = 
        "The field named <b>$EditFieldLabel1</b> (\"$EditFieldValue1\") should contain a number but <b><i>has too many periods</i></b>. Only one period is allowed as a decimal point. You must enter a legal number for this field. (E021)";    
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;


} elseif ($ErrorCode == "E022") {

//  E022: Number Has Too Low a Value

    $ErrorMessage = 
        "The field named <b>$EditFieldLabel1</b> (\"$EditFieldValue1\") has <b><i>too low a value</i></b>. You must enter a number and the lowest possible value is $EditLowValue. (E022)";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;


} elseif ($ErrorCode == "E023") {

//  E023: Number Has Too High a Value 
//      V2.1.2-P: fixed error; was reporting $EditLowValue instead of $EditHighValue

    $ErrorMessage = 
        "The field named <b>$EditFieldLabel1</b> (\"$EditFieldValue1\") has <b><i>too high a value</i></b> ($EditTestValue). You must enter a number and the highest possible value is $EditHighValue. (E023)";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;


} elseif ($ErrorCode == "E024") {

//  E024: Text Field Has an Illegal Character

    $ErrorMessage = 
        "The field named <b>$EditFieldLabel1</b> (\"$EditFieldValue1\") contains an <b><i>illegal character ($EditCharFormatted1) in position #$EditCharPos1</i></b>. You must enter a legal text value for this field. (E024)";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;


} elseif ($ErrorCode == "E025") {

//  E025: No Value Selected in Drop Down List for Addressees

    $ErrorMessage = 
        "There is a drop down list that asks you where this email should go. <b></i>You did not select a value</i></b>. (The value still shows as \"$EditParmValue1\".) You must select a value in this drop down list. $ErrorMessageSpam (E025)";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;


} elseif ($ErrorCode == "E026") {

//  E026: Too Few Checkboxes Checked

    if ($EditSubParmValue1 == 1) {
        $Tweak1 = "";
    } else {
        $Tweak1 = "es";
    }
    if ($EditSubParmValue2 == 1) {
        $Tweak2 = "";
    } else {
        $Tweak2= "es";
    }
    if (JSHEmpty($EditSubParmValue3)) {
        $EditSubParmValue3 = "(empty --- nothing checked)";
    }

    $ErrorMessage =
        "The checkbox group known as <b>$EditSubParmLabel1</b> <b><i>did not have enough boxes checked</i></b>. You checked $EditSubParmValue1 box$Tweak1. You must check at least $EditSubParmValue2 box$Tweak2. (E026) <br>........................................<br>The boxes checked in <b>$EditSubParmLabel1</b> were: <br>--- --- --- --- ---<br>$EditSubParmValue3<br>--- --- --- --- ---";    
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;


} elseif ($ErrorCode == "E027") {

//  E027: Too Many Checkboxes Checked

    if ($EditSubParmValue1 == 1) {
        $Tweak1 = "";
    } else {
        $Tweak1 = "es";
    }
    if ($EditSubParmValue2 == 1) {
        $Tweak2 = "";
    } else {
        $Tweak2= "es";
    }
    if (JSHEmpty($EditSubParmValue3)) {
        $EditSubParmValue3 = "(empty --- nothing checked)";
    }

    $ErrorMessage =
        "The checkbox group known as <b>$EditSubParmLabel1</b><b><i>had too many boxes checked</i></b>. You checked $EditSubParmValue1 box$Tweak1. You must not check more than $EditSubParmValue2 box$Tweak2. (E027) <br>........................................<br>The boxes checked in <b>$EditSubParmLabel1</b> were: <br>$EditSubParmValue3<br>--- --- --- --- ---";    
        echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;



//  CONFIGURATION ERRORS --------------------------------------


} elseif ($ErrorCode == "C001") {

//  C001: Field Not Sent to Form Script

    $ErrorMessage = 
        "The control parameter named <b>$EditParmName1</b> contains the name of a field (<b>$EditFieldName1</b>) that was <b><i>not sent to the Form Script</i></b>. The field is named in sub-parameter #$EditFieldPos1. You must enter the name of a field that is actually on the form and will be sent to the form script. (Note that \"browser\", \"ip\", \"referer\" and \"referrer\" are <b><i>not</i></b> legal in this use.) (C001) <br>........................................<br>The entire value of <b>$EditParmName1</b> is: <br>--- --- --- --- ---<br>$EditParmValue1<br>--- --- --- --- --- $ErrorMessagEC "; 
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;
    WriteEndOfErrorPage("abort");
    exit;


} elseif ($ErrorCode == "C002") {

//  C002: Field Not Sent to Form Script

    $ErrorMessage = 
        "The control parameter named <b>$EditParmName1</b> contains the name of a field (<b>$EditFieldName1</b>) that was <b><i>not sent to the Form Script</i></b>. The field is named in sub-parameter #$EditFieldPos1. You must enter the name of a field that is actually on the form and will be sent to the form script. (Note that \"browser\", \"ip\", \"referer\" and \"referrer\" <b><i>are</i></b> legal in this use.) (C002) <br>........................................<br>The entire value of <b>$EditParmName1</b> is: <br>--- --- --- --- ---<br>$EditParmValue1<br>--- --- --- --- --- $ErrorMessagEC "; 
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;
    WriteEndOfErrorPage("abort");
    exit;


} elseif ($ErrorCode == "C003") {

//  C003: Redundant Parameters Specified

    $ErrorMessage = 
        "The control parameter named <b>$EditParmName1</b> (\"$EditParmValue1\") and <b>$EditParmName2</b> (\"$EditParmValue2\") are <b><i>both specified</i></b> as parameters. These two parameters are redundant. <b><i>Only one</i></b> of these parameters is permitted. You must remove one of these parameters. <br><br><i>Because <b>$EditParmName1</b> is deprecated, we recommend keeping <b>$EditParmName2</b> and removing <b>$EditParmName1</i></b>. (C003) $ErrorMessagEC";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;
    WriteEndOfErrorPage("abort");
    exit;


} elseif ($ErrorCode == "C004") {

//  C004: Parameter Must Be Yes/No

    $ErrorMessage = 
        "The control parameter named <b>$EditParmName1</b> (\"$EditParmValue1\") does <b><i>not contain \"y\", \"yes\", \"n\" or \"no\"</i></b> (case does not matter). These are the <b><i>only</i></b> four values permitted for this parameter. You must use one of these values. (You may use any mix of upper-case and lower-case.) (C004) $ErrorMessagEC";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;
    WriteEndOfErrorPage("abort");
    exit;


} elseif ($ErrorCode == "C005") {
//changed V2.2.2 to improve reporting

//  C005: Sub-Parameter Must Be Yes/No, or Maybe Some Other Value
    
    $T1a = $EditSubParmNum1;
    $T2a = $FormFieldNameLabelPlusListArray [$T1a-1];
    $T1b = $T1a + 1;
    $T2b = $FormFieldNameLabelPlusListArray [$T1b-1];
    $T1c = $T1a + 2;
    $T2c = $FormFieldNameLabelPlusListArray [$T1c-1];
    $T1d = $T1a + 3;
    $T2d = $FormFieldNameLabelPlusListArray [$T1d-1];
    $T1e = $T1a + 4;
    $T2e = $FormFieldNameLabelPlusListArray [$T1e-1];
    $T1f = $T1a + 5;
    $T2f = $T1a;;

    $ErrorMessage =
        "The control parameter named <b>$EditParmName1</b> has an <b><i>illegal value in a sub-parameter</i></b>. The sub-parameter contains \"$EditSubParmValue1\" but the only legal values are $EditSubParm1LegalValues. You must use one of these values. (You may use any mix of upper-case and lower-case.) The sub-parameter is for the field named <b>$EditFieldName1</b>. The field name is in sub-parameter #$EditFieldPos1 and the illegal value is in sub-parameter #$EditSubParmPos1. Note that this error is frequently caused either by a missing comma or extra comma coming before the sub-parameter with the error. (C005) <br>........................................<br>
        SubParameter #$T1a: $T2a<br>
        SubParameter #$T1b: $T2b<br>
        SubParameter #$T1c: $T2c<br>
        SubParameter #$T1d: $T2d<br>
        SubParameter #$T1e: $T2e<br>
        SubParameter #$T1f: $T2f<br>
        ........................................<br>
        The entire value of <b>$EditParmName1</b> is: <br>--- --- --- --- ---<br>$EditParmValue1<br>--- --- --- --- --- $ErrorMessagEC ";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;
      WriteEndOfErrorPage("abort");
    exit;


} elseif ($ErrorCode == "C006") {

//  C006: Unknown Edit Specification

    $ErrorMessage = 
        "In the control parameter named <b>$EditParmName1</b>, <b><i>the edit (\"$EditEditValue1\") specified for </i>$EditFieldName1<i> is not recognized</i></b>. You must specify a valid edit. The edit specification begins in sub-parameter #$EditFieldPos1 and the erroneous edit value is in sub-parameter #$EditEditPos1. (C006) <br>........................................<br>The entire value of <b>$EditParmName1</b> is: <br>--- --- --- --- ---<br>$EditParmValue1<br>--- --- --- --- --- $ErrorMessagEC ";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;
    WriteEndOfErrorPage("abort");
    exit;


} elseif ($ErrorCode == "C007") {

//  C007: Illegal Email Addr – Wrong Number of Characters or “@”

    $EditSubParmPos2 = $EditSubParmPos1 + 1; 
    $EditSubParmPos3 = $EditSubParmPos1 + 2; 
    $ErrorMessage = 
        "The control parameter named <b>$EditParmName1</b> contains an <b><i>illegal email address</i></b> (\"$EditSubParmValue1\"). The email address is illegal because it has the <b><i>wrong number of characters in one section or the wrong number of @ symbols</i></b>. You must enter a valid email address into this field. The erroneous email address begins in sub-parameter #$EditSubParmPos1. The two \"parts\" of the email address are in sub-parameter #$EditSubParmPos2 and sub-parameter #$EditSubParmPos3. (C007) <br>........................................<br>The entire value of <b>$EditParmName1</b> is: <br>--- --- --- --- ---<br>$EditParmValue1<br>--- --- --- --- --- $ErrorMessagEC ";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;
    WriteEndOfErrorPage("abort");
    exit;


} elseif ($ErrorCode == "C008") {

//  C008: Illegal Email Addr – Incorrect Local Address Part

    $EditSubParmPos2 = $EditSubParmPos1 + 1; 
    $EditSubParmPos3 = $EditSubParmPos1 + 2; 
    $ErrorMessage = 
        "<b>The control parameter named $EditParmName1</b> contains an <b><i>illegal email address</i></b> (\"$EditSubParmValue1\"). The email address is illegal because the <b><i>local address part before the @-sign (\"$EditSubParmValue2\") is invalid</i></b>. You must enter a valid email address into this field. The erroneous email address begins in sub-parameter #$EditSubParmPos1. The two \"parts\" of the email address are in sub-parameter #$EditSubParmPos2 and sub-parameter #$EditSubParmPos3. (C008) <br>........................................<br>The entire value of <b>$EditParmName1</b> is: <br>--- --- --- --- ---<br>$EditParmValue1<br>--- --- --- --- --- $ErrorMessagEC ";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;
    WriteEndOfErrorPage("abort");
    exit;


} elseif ($ErrorCode == "C009") {

//  C009: Illegal Email Addr – Not Enough Parts in Domain Name

    $EditSubParmPos2 = $EditSubParmPos1 + 1; 
    $EditSubParmPos3 = $EditSubParmPos1 + 2; 
    $ErrorMessage = 
        "The control parameter named <b>$EditParmName1</b> contains an <b><i>illegal email address</i></b> (\"$EditSubParmValue1\"). The email address is illegal because <b><i>there are not enough parts in the domain name (\"$EditSubParmValue2\")</i></b>. You must enter a valid email address into this field. The erroneous email address begins in sub-parameter #$EditSubParmPos1. The two \"parts\" of the email address are in sub-parameter #$EditSubParmPos2 and sub-parameter #$EditSubParmPos3. (C009) <br>........................................<br>The entire value of <b>$EditParmName1</b> is: <br>--- --- --- --- ---<br>$EditParmValue1<br>--- --- --- --- --- $ErrorMessagEC ";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;
    WriteEndOfErrorPage("abort");
    exit;


} elseif ($ErrorCode == "C010") {

//  C010: Illegal Email Addr – Domain Name Built Wrong

    $EditSubParmPos2 = $EditSubParmPos1 + 1; 
    $EditSubParmPos3 = $EditSubParmPos1 + 2; 
    $ErrorMessage = 
        "The control parameter named <b>$EditParmName1</b> contains an <b><i>illegal email address</i></b> (\"$EditSubParmValue1\"). The email address is illegal because <b><i>the domain name (\"$EditSubParmValue2\") contains illegal characters or is built wrong</i></b>. You must enter a valid email address into this field. The erroneous email address begins in sub-parameter #$EditSubParmPos1. The two \"parts\" of the email address are in sub-parameter #$EditSubParmPos2 and sub-parameter #$EditSubParmPos3. (C010) <br>........................................<br>The entire value of <b>$EditParmName1</b> is: <br>--- --- --- --- ---<br>$EditParmValue1<br>--- --- --- --- --- $ErrorMessagEC ";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;
    WriteEndOfErrorPage("abort");
    exit;


} elseif ($ErrorCode == "C011") {

//  C011: Illegal Email Addr – Domain Name Doesn’t Exist or Can’t Receive Email

    $EditSubParmPos2 = $EditSubParmPos1 + 1; 
    $EditSubParmPos3 = $EditSubParmPos1 + 2; 
    $ErrorMessage = 
        "The control parameter named <b>$EditParmName1</b> contains an <b><i>illegal email address</i></b> (\"$EditSubParmValue1\"). The email address is illegal because <b><i>either the domain name (\"$EditSubParmValue2\") does not exist, or it is not set up to receive email</i></b>. You must enter a valid email address into this field. The erroneous email address begins in sub-parameter #$EditSubParmPos1. The two \"parts\" of the email address are in sub-parameter #$EditSubParmPos2 and sub-parameter #$EditSubParmPos3. If you are using a Windows server, you may need to specify the FormPleaseForgiveMyUseOfAWindowsServer parameter. (C011) <br>........................................<br>The entire value of <b>$EditParmName1</b> is: <br>--- --- --- --- ---<br>$EditParmValue1<br>--- --- --- --- --- $ErrorMessagEC ";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;
    WriteEndOfErrorPage("abort");
    exit;


} elseif ($ErrorCode == "C012") {

//  C012: Missing Terminator

    $ErrorMessage = 
        "The control parameter named <b>$EditParmName1</b> was <b><i>not properly terminated</i></b>. It should have terminated with a tilde (\"~\"). You must correct this parameter to terminate with a tilde (\"~\"). On many keyboards the tilde (\"~\") is on the key left of the \"1\" at the top of the keyboard. (C012) <br>........................................<br>The entire value of <b>$EditParmName1</b> is: <br>--- --- --- --- ---<br>$EditParmValue1<br>--- --- --- --- --- $ErrorMessagEC ";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;
    WriteEndOfErrorPage("abort");
    exit;


} elseif ($ErrorCode == "C013") {

//  C013: Individual Edit Specification Not Properly Terminated

    $ErrorMessage = 
        "In the control parameter named <b>$EditParmName1</b>, <b><i>one of the edits was not properly terminated</i></b>. The edit probably has <b><i>an incorrect number of sub-parameters</i></b>. You must correct this edit. The edit begins with sub-parameter #$EditFieldPos1 for the field <b>$EditFieldLabel1</b>. It is a \"$EditEditValue1\" edit. It should have terminated with a \"~\" in sub-parameter #$EditSubParmPos4. Instead that sub-parameter contained \"$EditSubParmValue4\". (C013) <br>........................................<br>The entire value of <b>$EditParmName1</b> is: <br>--- --- --- --- ---<br>$EditParmValue1<br>--- --- --- --- --- $ErrorMessagEC ";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;
    WriteEndOfErrorPage("abort");
    exit;


} elseif ($ErrorCode == "C014") {

//  C014: Illegal Text Edit Sub-Parameter

    $ErrorMessage = 
        "In the control parameter named <b>$EditParmName1</b>, for the \"text\" edit, <b><i>one of the sub-parameters is not recognized</i></b>. You must correct this edit to specify a valid sub-parameter. The edit begins with sub-parameter #$EditFieldPos1 for the field <b>$EditFieldLabel1</b>. The illegal sub-parameter is at position #$EditSubParmPos1 and has a value of \"$EditSubParmValue1\". (C014) <br>........................................<br>The entire value of <b>$EditParmName1</b> is: <br>--- --- --- --- ---<br>$EditParmValue1<br>--- --- --- --- --- $ErrorMessagEC ";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;
    WriteEndOfErrorPage("abort");
    exit;


} elseif ($ErrorCode == "C015") {

//  C015: Wrong Number of Sub-Parameters (absolute)

    $ErrorMessage = 
        "<b>The control parameter named $EditParmName1</b> has the <b><i>wrong number of sub-parameters ($EditSubParmValue1)</i></b>. The number of sub-parameters must be $EditSubParmValue2. You must correct this edit to specify $EditSubParmValue2 sub-parameters. (C015) <br>........................................<br>The entire value of <b>$EditParmName1</b> is: <br>--- --- --- --- ---<br>$EditParmValue1<br>--- --- --- --- --- $ErrorMessagEC ";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;
    WriteEndOfErrorPage("abort");
    exit;
    

} elseif ($ErrorCode == "C016") {

//  C016: Wrong Number of Sub-Parameters (multiple)

    $ErrorMessage = 
        "<b> The control parameter named $EditParmName1</b> has the <b><i>wrong number of sub-parameters ($EditSubParmValue1)</i></b>. The <b><i>number of sub-parameters must be a multiple of $EditSubParmValue2</i></b>. You must correct this edit to specify a correct number of sub-parameters. (C016) <br>........................................<br>The entire value of <b>$EditParmName1</b> is: <br>--- --- --- --- ---<br>$EditParmValue1<br>--- --- --- --- --- $ErrorMessagEC ";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;
    WriteEndOfErrorPage("abort");
    exit;
    

} elseif ($ErrorCode == "C017") {

//  C017: Sub-Parameter Contains an Illegal Integer

    $ErrorMessage = 
        "The control parameter named <b>$EditParmName1</b> contains an <b><i>illegal integer</i></b> as a sub-parameter. The <b><i>sub-parameter (\"$EditSubParmValue1\") should be an integer but contains an illegal character</i></b> ($EditCharFormatted1) in <i>position</i> #$EditCharPos1. This sub-parameter is the <b>$EditSubParmName1</b> for the specification of the field named <b>$EditFieldName1</b>. You must enter a legal integer for this field. (C017) <br>........................................<br>The entire value of <b>$EditParmName1</b> is: <br>--- --- --- --- ---<br>$EditParmValue1<br>--- --- --- --- --- $ErrorMessagEC ";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;
    WriteEndOfErrorPage("abort");
    exit;
    

} elseif ($ErrorCode == "C018") {

//  C018: Injection Exploit

    $ErrorMessage = 
        "The control parameter named <b>$EditParmName1</b> contains a <b><i>possible injection exploit</i></b>. When a spambot places <i>content-type</i>, <i>bcc:</i>, <i>cc:</i>, <i>document.cookie</i>, <i>onclick</i>, or <i>onload</i> in a field this is called an \"injection exploit\". <i>Placing these values in a field is one way spambots hijack the form/script to send spam.<i> If you are not a spambot and have placed one of these codes in any field, you must find another way to send this information. Type your information without using one of these codes. (C018) <br>........................................<br>The entire value of <b>$EditParmName1</b> is: <br>--- --- --- --- ---<br>$EditParmValue1<br>--- --- --- --- --- $ErrorMessagEC ";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;
    WriteEndOfErrorPage("abort");
    exit;


} elseif ($ErrorCode == "C019") {

//  C019: Temporary Parm Must Be Replaced

    $ErrorMessage = 
        "The control parameter named <b>$EditParmName1</b> was temporarily used during development of Pre-Releases of Version 2.0 while it was in test but <i><b>is now invalid</i></b>. Instead, the parameter became named <b>$EditParmName2</b>. You must replace your use of <b>$EditParmName1</b> with <b>$EditParmName2</b> instead. In addition, you should check the manual to see if any format changes are required. (C019) <br>........................................<br>The entire value of <b>$EditParmName1</b> is: <br>--- --- --- --- ---<br>$EditParmValue1<br>--- --- --- --- --- $ErrorMessagEC ";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;
    WriteEndOfErrorPage("abort");
    exit;
    

} elseif ($ErrorCode == "C020") {

//  C020: Wrong Number of Sub-Parameters (multiple plus some)

    $ErrorMessage = 
        "The control parameter named <b>$EditParmName1</b> has the <b><i>wrong number of sub-parameters ($EditSubParmValue1)</i></b>. The number of sub-parameters must be $EditSubParmValue3 more than a multiple of $EditSubParmValue2. You must correct this edit to specify a correct number of sub-parameters. (C020) <br>........................................<br>The entire value of <b>$EditParmName1</b> is: <br>--- --- --- --- ---<br>$EditParmValue1<br>--- --- --- --- --- $ErrorMessagEC ";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;
    WriteEndOfErrorPage("abort");
    exit;


} elseif ($ErrorCode == "C021") {

//  C021: Redundant Parameters Specified

    $ErrorMessage = 
        "The control parameters named <b>$EditParmName1</b> (\"$EditParmValue1\") and <b>$EditParmName2</b> (\"$EditParmValue2\") are <b><i>both specified as parameters</i></b>. These two parameters are redundant. Only one of these parameters is permitted. You must remove one of these parameters. (C021) $ErrorMessagEC";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;
    WriteEndOfErrorPage("abort");
    exit;


} elseif ($ErrorCode == "C022") {

//  C022: Asterisk (“*”) is Illegal

    $ErrorMessage =
        "The control parameter of <b>$EditParmName1</b> (\"$EditParmValue1\") <b><i>is not permitted to have a value of asterisk</i></b>. There is no back reference or \"prior value\" for an asterisk to reference. You must remove the asterisk. (C022) $ErrorMessagEC";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;
    WriteEndOfErrorPage("abort");
    exit;


} elseif ($ErrorCode == "C023") {

//  C023: FormFieldNameValueSubstitutionList Has Been Eliminated as a Parameter

    $ErrorMessage =
        "The control parameter named <b>$EditParmName1</b> <b><i>has been eliminated as a parameter</i></b>. You should probably assign the same values to <b>Msg1FieldNameValueSubstitutionList</b>. You may also wish to consider using an asterisk (\"*\") for <b>Msg2FieldNameValueSubstitutionList</b> and <b>MsgEchoFieldNameValueSubstitutionList</b> to pick up the value of <b>Msg1FieldNameValueSubstitutionList</b>. This change was introduced in V2.0-PR-329. (C023) <br>........................................<br>The entire value of <b>$EditParmName1</b> is: <br>--- --- --- --- ---<br>$EditParmValue1<br>--- --- --- --- --- $ErrorMessagEC ";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;
    WriteEndOfErrorPage("abort");
    exit;


} elseif ($ErrorCode == "C024") {

//  C024: File Open Failure

    $ErrorMessage =
        "The control parameter named <b>$EditParmName1</b> (\"$EditParmValue1\") <b><i>was unable to open the specified file</i></b>. You must specify a correct file. (C024) $ErrorMessagEC ";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;
    WriteEndOfErrorPage("abort");
    exit;


} elseif ($ErrorCode == "C025") {

//  C025: Error Template File Format Failure

    $ErrorMessage =
        "The control parameter named <b>$EditParmName1</b> (\"$EditParmValue1\") specifies a file that <b><i>does not contain \"$TemplateErrorPlacementString\"</i></b>. You must specify a correct file. (C025) $ErrorMessagEC ";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;
    WriteEndOfErrorPage("abort");
    exit;


} elseif ($ErrorCode == "C026") {
//  C026: Sub-parameter Number Contains Illegal Character

    $ErrorMessage =     
        "The control parameter named <b>$EditParmName1</b> has an <b><i>illegal number in sub-parameter #$EditSubParmPos1 ($EditSubParmValue1)</i></b>. This value should be a number but has an illegal character ($EditCharFormatted1) in position #$EditCharPos1. You must enter a legal number for this field. (C026) <br>........................................<br>The entire value of <b>$EditParmName1</b> is: <br>--- --- --- --- ---<br>$EditParmValue1<br>--- --- --- --- --- $ErrorMessagEC ";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;
    WriteEndOfErrorPage("abort");
    exit;


} elseif ($ErrorCode == "C027") {

//  C027: Too Many Periods in a Number

    $ErrorMessage = 
        "The control parameter named <b>$EditParmName1</b> has an <b><i>illegal number in sub-parameter #$EditSubParmPos1 ($EditSubParmValue1)</i></b>. This value should be a number but has too many periods. Only one period is allowed as a decimal point. You must enter a legal number for this field. (C027) <br>........................................<br>The entire value of <b>$EditParmName1</b> is: <br>--- --- --- --- ---<br>$EditParmValue1<br>--- --- --- --- --- $ErrorMessagEC ";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;
    WriteEndOfErrorPage("abort");
    exit;


} elseif ($ErrorCode == "C028") {

//  C028: Number Has Too Low a Value

    $ErrorMessage = 
        "The control parameter named <b>$EditParmName1</b> has an <b><i>illegal number in sub-parameter #$EditSubParmPos1 ($EditSubParmValue1)</i></b>. The value is too low. The lowest possible value is $EditLowValue. You must enter a legal number for this field. (C028) <br>........................................<br>The entire value of <b>$EditParmName1</b> is: <br>--- --- --- --- ---<br>$EditParmValue1<br>--- --- --- --- --- $ErrorMessagEC ";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;
    WriteEndOfErrorPage("abort");
    exit;


} elseif ($ErrorCode == "C029") {

//  E029: Number Has Too High a Value

    $ErrorMessage = 
        "The control parameter named <b>$EditParmName1</b> has an <b><i>illegal number in sub-parameter #$EditSubParmPos1 ($EditSubParmValue1)</i></b>. The value is too high. The highest possible value is $EditHighValue. You must enter a legal number for this field. (C029) <br>........................................<br>The entire value of <b>$EditParmName1</b> is: <br>--- --- --- --- ---<br>$EditParmValue1<br>--- --- --- --- --- $ErrorMessagEC ";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;
    WriteEndOfErrorPage("abort");
    exit;


} elseif ($ErrorCode == "C030") {

//  E030: Illegal color specification

    $ErrorMessage = 
        "The control parameter named <b>$EditParmName1</b> has an <b><i>illegal color value in sub-parameter #$EditSubParmPos1 ($EditSubParmValue1)</i></b>. This value does not start with a \"#\" and doesn't match a color value. You must enter a legal color for this field. Colors must be pound sign (\"#\") followed by a 6 character hex number or must be an accepted color value. The accepted color values are \"black\", \"silver\", \"gray\", \"white\", \"maroon\", \"red\", \"purple\", \"fuchsia\", \"green\", \"lime\", \"olive\", \"yellow\", \"navy\", \"blue\", \"teal\" and \"aqua\". (C030) <br>........................................<br>The entire value of <b>$EditParmName1</b> is: <br>--- --- --- --- ---<br>$EditParmValue1<br>--- --- --- --- --- $ErrorMessagEC ";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;
    WriteEndOfErrorPage("abort");
    exit;

} elseif ($ErrorCode == "C031") {

//  E031: Illegal color specification

    $ErrorMessage = 
        "The control parameter named <b>$EditParmName1</b> has an <b><i>illegal color value in sub-parameter #$EditSubParmPos1 ($EditSubParmValue1)</i></b>. This value starts with a \"#\" but is the wrong length. You must enter a legal color for this field. Colors must be pound sign (\"#\") followed by a 6 character hex number or must be an accepted color value. The accepted color values are \"black\", \"silver\", \"gray\", \"white\", \"maroon\", \"red\", \"purple\", \"fuchsia\", \"green\", \"lime\", \"olive\", \"yellow\", \"navy\", \"blue\", \"teal\" and \"aqua\". (C031) <br>........................................<br>The entire value of <b>$EditParmName1</b> is: <br>--- --- --- --- ---<br>$EditParmValue1<br>--- --- --- --- --- $ErrorMessagEC ";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;
    WriteEndOfErrorPage("abort");
    exit;


} elseif ($ErrorCode == "C032") {

//  E032: Illegal hex value

    $ErrorMessage = 
        "The control parameter named <b>$EditParmName1</b> has an <b><i>illegal color value in sub-parameter #$EditSubParmPos1 ($EditSubParmValue1)</i></b>. This value starts with a \"#\" but is an invalid hex number. You must enter a legal color for this field. Colors must be pound sign (\"#\") followed by a 6 character hex number or must be an accepted color value. The accepted color values are \"black\", \"silver\", \"gray\", \"white\", \"maroon\", \"red\", \"purple\", \"fuchsia\", \"green\", \"lime\", \"olive\", \"yellow\", \"navy\", \"blue\", \"teal\" and \"aqua\". (C032) <br>........................................<br>The entire value of <b>$EditParmName1</b> is: <br>--- --- --- --- ---<br>$EditParmValue1<br>--- --- --- --- --- $ErrorMessagEC ";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;
    WriteEndOfErrorPage("abort");
    exit;

} elseif ($ErrorCode == "C033") {

//  E033: Subparm not y/n

    $ErrorMessage = 
        "The control parameter named <b>$EditParmName1</b> has an <b><i>illegal bold flag in sub-parameter #$EditSubParmPos1 ($EditSubParmValue1)</i></b>. The bold flag must be \"y\", \"yes\", \"n\", \"no\" or empty. You must enter a legal value for this field. (C033) <br>........................................<br>The entire value of <b>$EditParmName1</b> is: <br>--- --- --- --- ---<br>$EditParmValue1<br>--- --- --- --- --- $ErrorMessagEC ";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;
    WriteEndOfErrorPage("abort");
    exit;


} elseif ($ErrorCode == "C034") {

//  E034: A Missing CSS Class Value 

    $ErrorMessage = 
        "The control parameter named <b>$EditParmName1</b> <b><i>does not specify a CSS Class value</i></b>. The control parameters are specifying CSS Class values for some of the Error Page formatting. When this is done all Error Page formatting must be designated with CSS Class values. Further, CSS Class values are required for all six (6) Error Page Format items, including: (1) Heading 1, (2) Heading 2, (3) the page opening line, (4) the error messages, (5) the page closing line and (6) the footer. If you wish to use CSS Class values, you must enter a CSS Class value for this field. (C034) <br>........................................<br>The entire value of <b>$EditParmName1</b> is: <br>--- --- --- --- ---<br>$EditParmValue1<br>--- --- --- --- --- $ErrorMessagEC ";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;
    WriteEndOfErrorPage("abort");
    exit;


} elseif ($ErrorCode == "C035") {

//  C035: CSI + FORMAT

    $ErrorMessage = 
        "The control parameter named <b>$EditParmName1</b> <b><i>specifies a CSS Class while the parameter named $EditParmName2 specifies \"old style\" formatting (e.g., face, size, color and \"boldness\")<b><i>. You must use one or the other for all six (6) Error Page items, including: (1) Heading 1, (2) Heading 2, (3) the page opening line, (4) the error messages, (5) the page closing line and (6) the footer. (C035) <br>........................................<br>The entire value of <b>$EditParmName1</b> is: <br>--- --- --- --- ---<br>$EditParmValue1<br>--- --- --- --- --- <br>The entire value of <b>$EditParmName2</b> is: <br>--- --- --- --- ---<br>$EditParmValue2<br>--- --- --- --- --- $ErrorMessagEC ";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;
    WriteEndOfErrorPage("abort");
    exit;


} elseif ($ErrorCode == "C036") {

//  C036: non null subparameter

    $ErrorMessage = 
        "The control parameter named <b>$EditParmName1</b> has a <b><i>non-blank (non-null) value in sub-parameter #$EditSubParmPos1 ($EditSubParmValue1)</i></b>. This sub-parameter must be blank (null). You must reconfigure the parameter to present this sub-parameter as empty. (C036) <br>........................................<br>The entire value of <b>$EditParmName1</b> is: <br>--- --- --- --- ---<br>$EditParmValue1<br>--- --- --- --- --- $ErrorMessagEC ";    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;
    WriteEndOfErrorPage("abort");
    exit;


} elseif ($ErrorCode == "C999") {

//  C999: xxxxxxxxxxxxxxxxxxxxxxxxxx

    $ErrorMessage =
        "File open failure. (C999)";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;
    WriteEndOfErrorPage("abort");
    exit;


} elseif ($ErrorCode == "C998") {

//  C998: xxxxxxxxxxxxxxxxxxxxxxxxxx

    $ErrorMessage =
        "Forcing end. (C998)";
    echo $ErrorPrefix, $ErrorMessage, $ErrorSuffix;
    WriteEndOfErrorPage("abort");
    exit;


} else {

    $B = "B";

}

}  //  End of WriteErrorMessage()




//*************************************************************
//  FUNCTION: WriteEndOfErrorPage($AbortOrNot)
//*************************************************************

function WriteEndOfErrorPage($AbortOrNot) {

//-------------------------------------------------------------
//  Write the end of the error page.
//-------------------------------------------------------------

global 
    $at,
    $Browser,

    $CopyUser,

    $CRLF,

    $EditCharFormatted1,
    $EditCharPos1,
    $EditCharValue1,
    $EditEditValue1,   
    $EditEditPos1,    
    $EditFieldActualSize1,
    $EditFieldActualSize2,
    $EditFieldLabel1,
    $EditFieldLabel2,
    $EditFieldMaxSize1,
    $EditFieldMaxSize2,
    $EditFieldMinSize1,
    $EditFieldMinSize2,
    $EditFieldName1,    
    $EditFieldName2, 
    $EditFieldPos1,    
    $EditFieldPos2,    
    $EditFieldValue1,    
    $EditFieldValue2, 
    $EditLowValue,
    $EditHighValue,
    $EditParmName1,    
    $EditParmName2,
    $EditParmValue1,    
    $EditParmValue2,
    $EditParmValue3,
    $EditSubParmLabel1,
    $EditSubParm1LegalValues,
    $EditSubParmName1,
    $EditSubParmNum1,
    $EditSubParmNum2,
    $EditSubParmPos1,  
    $EditSubParmPos2,
    $EditSubParmPos3,
    $EditSubParmPos4,
    $EditSubParmValue1,    
    $EditSubParmValue2,
    $EditSubParmValue3,
    $EditSubParmValue4,
    $EditTestValue,

    $ErrorMessagEC,
    $ErrorMessageSpam,
//    $ErrorNumber,
    $ErrorPrefix,
    $ErrorSequenceNumber,
    $ErrorSuffix,
    $ErrorsWritten,

    $FormCSVFileName,
    $FormEchoUser,
    $FormEmail,
    $FormEmailConfirmation,
    $FormEmailConfirmationField,
    $FormEmailConfirmationFieldLabel,
    $FormEmailField,
    $FormEmailFieldLabel,
    $FormEmailFieldList,

    $FormErrorPageCSSClassCount,
    $FormErrorPageErrorMsgClass,
    $FormErrorPageErrorMsgColor,
    $FormErrorPageErrorMsgFace,
    $FormErrorPageErrorMsgSize,
    $FormErrorPageFooterClass,
    $FormErrorPageFooterColor,
    $FormErrorPageFooterFace,
    $FormErrorPageFooterSize,
    $FormErrorPageHeading1,
    $FormErrorPageHeading1Bold,
    $FormErrorPageHeading1Class,
    $FormErrorPageHeading1Color,
    $FormErrorPageHeading1Face,
    $FormErrorPageHeading1Size,
    $FormErrorPageHeading2,
    $FormErrorPageHeading2Bold,
    $FormErrorPageHeading2Class,
    $FormErrorPageHeading2Color,
    $FormErrorPageHeading2Face,
    $FormErrorPageHeading2Size,
    $FormErrorPageLastCSSClassField,
    $FormErrorPageLastFormatField,
    $FormErrorPageLinEClosing,
    $FormErrorPageLinEClosingBold,
    $FormErrorPageLinEClosingClass,
    $FormErrorPageLinEClosingColor,
    $FormErrorPageLinEClosingFace,
    $FormErrorPageLinEClosingSize,
    $FormErrorPageLineOpening,
    $FormErrorPageLineOpeningBold,
    $FormErrorPageLineOpeningClass,
    $FormErrorPageLineOpeningColor,
    $FormErrorPageLineOpeningFace,    
    $FormErrorPageLineOpeningSize,
    $FormErrorPageTemplate,    
    $FormErrorPageTemplateContents,
    $FormErrorPageTitle,
    $FormErrorPageTrackingInfo,

    $FormFieldNameEditList,
    $FormFieldNameEditListArray,
    $FormFieldNameExcludEArray,
    $FormFieldNameLabelArray,
    $FormFieldNameLabelListArray,
    $FormFieldNameLabelPlusList,
    $FormFieldNameLabelPlusListArray,
    $FormFieldNameMinSizEArray,
    $FormFieldNameMaxSizEArray,
    $FormFieldNameRequiredArray,
    $FormName,
    $FormNamEField,
    $FormNameFieldList,
    $FormNextURL,
    $FormOutputFieldInfo,
    $FormPleaseForgiveMyUseOfAWindowsServer,
    $FormTestEmailDomain,
    $FormTestEmailFormat,
    $FormTestFieldMinLengths,
    $FormTestFieldMaxLengths,
    $FormTestInjectionExploits,

    $HoldMsg1AddrList,
    $HoldMsg1Subject,

    $HoldMsg2AddrList,
    $HoldMsg2Subject,

    $IP,
    $Message, 

    $Msg0AddrList,
    $Msg0DefaultFromAddr,
    $Msg0FieldLabelValueSeparator, 
    $Msg0FieldNameExcludEArray,
    $Msg0FieldNameExcludeListArray,
    $Msg0FieldNameLabelList,
    $Msg0FieldNameLabelListArray,
    $Msg0FieldNameLabelListArrayDefault,
    $Msg0FieldNameValueSubstitutionArray,
    $Msg0FieldNameValueSubstitutionList,
    $Msg0FieldValueTerminator,
    $Msg0ForcEDefaultFromAddr,
    $Msg0Subject,
    $Msg0TextBottom,
    $Msg0TextTop,

    $Msg1LabelSubjectAndAddressesDropDown,
    $Msg1AddrList,
    $Msg1AddrListAndSubjectSetByDropDown,
    $Msg1DefaultFromAddr,
    $Msg1FieldLabelValueSeparator,
    $Msg1FieldNameExcludeList,
    $Msg1FieldNameExcludeListArray,
    $Msg1FieldNameLabelList,
    $Msg1FieldNameLabelListArray,
    $Msg1FieldNameValueSubstitutionArray,
    $Msg1FieldNameValueSubstitutionList,
    $Msg1FieldNameValueSubstitutionList2,
    $Msg1ForcEDefaultFromAddr,
    $Msg1Subject,
    $Msg1SubjectField,
    $Msg1TextBottom,
    $Msg1TextTop,

    $Msg2LabelSubjectAndAddressesDropDown,
    $Msg2AddrList,
    $Msg2AddrListAndSubjectSetByDropDown,
    $Msg2DefaultFromAddr,
    $Msg2FieldLabelValueSeparator,
    $Msg2FieldNameExcludeList,
    $Msg2FieldNameExcludeListArray,
    $Msg2FieldNameLabelList,
    $Msg2FieldNameLabelListArray,
    $Msg2FieldNameValueSubstitutionArray,
    $Msg2FieldNameValueSubstitutionList,
    $Msg2FieldNameValueSubstitutionList2,
    $Msg2ForcEDefaultFromAddr,
    $Msg2Subject,
    $Msg2SubjectField,
    $Msg2TextBottom,
    $Msg2TextTop,

    $MsgEchoAddressee,
    $MsgEchoFromAddr,
    $MsgEchoFieldLabelValueSeparator,
    $MsgEchoFieldNameExcludeList,
    $MsgEchoFieldNameExcludeListArray,
    $MsgEchoFieldNameLabelList,
    $MsgEchoFieldNameLabelListArray,
    $MsgEchoFieldNameValueSubstitutionArray,
    $MsgEchoFieldNameValueSubstitutionList,
    $MsgEchoFieldNameValueSubstitutionLists,
    $MsgEchoSubject,
    $MsgEchoTextBottom,
    $MsgEchoTextTop,

    $MsgNumber,

    $NextURL,
    $PHPVersion,
    $Referer,
    $ProcessFormFieldNameLabelPlusListDone,
    $ScriptPathShort,
    $ScriptPathLong,
    $ScriptStartTime,    
    $ScriptVersion,
    $TemplateErrorPlacementString,
    $ValidFieldEditsArray;

if ($AbortOrNot == "abort") {
    $FormErrorPageLinEClosing = "You cannot correct this error by resubmitting this form. <br>Please immediately copy this information and notify the webmaster of this error.";
}

if ($FormErrorPageLinEClosingBold == "yes") {
    $FormErrorPageLinEClosingBold1 = "<b>";
    $FormErrorPageLinEClosingBold2 = "</b>";
} else {
    $FormErrorPageLinEClosingBold1 = "";
    $FormErrorPageLinEClosingBold2 = "";
}

if (!JSHEmpty($FormErrorPageLinEClosingClass)) {
    echo "<p class=\"$FormErrorPageLinEClosingClass\">$FormErrorPageLinEClosing</p>$CRLF";
} else {
    echo "<p><font face=\"$FormErrorPageLinEClosingFace\" size=\"$FormErrorPageLinEClosingSize\" color=\"$FormErrorPageLinEClosingColor\">$FormErrorPageLinEClosingBold1$FormErrorPageLinEClosing$FormErrorPageLinEClosingBold2</font></p>$CRLF";
}

echo "<p>&nbsp;</p>$CRLF";  

if (!JSHEmpty($FormErrorPageFooterClass)) {
    echo "<p class=\"$FormErrorPageFooterClass\">";
} else {
    echo "<font face=\"$FormErrorPageFooterFace\" size=\"$FormErrorPageFooterSize\" color=\"$FormErrorPageFooterColor\"$CRLF><p>";
}

echo "This form uses <a href=\"http://www.JamesSHuggins.com/huggins-email-form-script\" target=\"_blank\" title=\"This form uses Huggins' Email Form Script. Huggins' Email Form Scriptis a free PHP server script which processes email forms. The script processes complex forms, edits the user responses, sends formatted emails to multiple recipients, protects email addresses from spider harvesters and shields the script from spambots hijacking. No PHP knowledge is required to use the script.\">Huggins' Email Form Script.</a><br>$CRLF";
echo "<a href=\"http://www.JamesSHuggins.com/huggins-email-form-script\" target=\"_blank\" title=\"This form uses Huggins' Email Form Script. Huggins' Email Form Scriptis a free PHP server script which processes email forms. The script processes complex forms, edits the user responses, sends formatted emails to multiple recipients, protects email addresses from spider harvesters and shields the script from spambots hijacking. No PHP knowledge is required to use the script.\">Huggins' Email Form Script</a> is a <i>free</i> PHP server script which processes email forms. <br>$CRLF";
echo "The script processes complex forms, edits the user responses, sends formatted emails <br>$CRLF";
echo "to multiple recipients, protects email addresses from spider harvesters and shields the<br>$CRLF";
echo "script from spambots hijacking. No PHP knowledge is required to use the script.</p>$CRLF";

if ($FormErrorPageTrackingInfo != "no" or $FormOutputFieldInfo == "yes" or $AbortOrNot == "abort") {

    if (!JSHEmpty($FormErrorPageFooterClass)) {
        echo "<p class=\"$FormErrorPageFooterClass\">";
    } else {
        echo "<p>";
    }

//    echo "<b>TRACKING INFORMATION</b><br>$CRLF";
//    echo "Script Start Time: $ScriptStartTime<br>$CRLF";
//    echo "IP: $IP <br>$CRLF";
//    echo "Referer: $Referer <br>$CRLF";
//    echo "PHP Version: $PHPVersion <br>$CRLF";
//    echo "Script Version: $ScriptVersion <br>$CRLF";
//    echo "Script Path (short): $ScriptPathShort <br>$CRLF";
//    echo "Script Path (long): $ScriptPathLong <br>$CRLF";
//    echo "Browser: $Browser <br><br></p>$CRLF";
}
if (!JSHEmpty($FormErrorPageFooterClass)) {
    $A = "a";
} else {
    echo "</font>$CRLF";
}

if (!JSHEmpty($FormErrorPageTemplateContents)) {
    $Pos1 = strpos($FormErrorPageTemplateContents, $TemplateErrorPlacementString) + strlen($TemplateErrorPlacementString);
    echo substr($FormErrorPageTemplateContents, $Pos1);
}    

}  //  End of WriteEndOfErrorPage()




//*************************************************************
//  FUNCTION: EditInteger($EditFieldValue, &$EditCharValue, &$EditCharFormatted, &$EditCharPos)
//*************************************************************

function EditInteger($EditFieldValue, &$EditCharValue, &$EditCharFormatted, &$EditCharPos) {

//-------------------------------------------------------------
//  Edit an integer.
//-------------------------------------------------------------

global 
    $at,
    $Browser,

    $CopyUser,

    $CRLF,

    $EditCharFormatted1,
    $EditCharPos1,
    $EditCharValue1,
    $EditEditValue1,   
    $EditEditPos1,    
    $EditFieldActualSize1,
    $EditFieldActualSize2,
    $EditFieldLabel1,
    $EditFieldLabel2,
    $EditFieldMaxSize1,
    $EditFieldMaxSize2,
    $EditFieldMinSize1,
    $EditFieldMinSize2,
    $EditFieldName1,    
    $EditFieldName2, 
    $EditFieldPos1,    
    $EditFieldPos2,    
    $EditFieldValue1,    
    $EditFieldValue2, 
    $EditLowValue,
    $EditHighValue,
    $EditParmName1,    
    $EditParmName2,
    $EditParmValue1,    
    $EditParmValue2,
    $EditParmValue3,
    $EditSubParmLabel1,
    $EditSubParm1LegalValues,
    $EditSubParmName1,
    $EditSubParmNum1,
    $EditSubParmNum2,
    $EditSubParmPos1,  
    $EditSubParmPos2,
    $EditSubParmPos3,
    $EditSubParmPos4,
    $EditSubParmValue1,    
    $EditSubParmValue2,
    $EditSubParmValue3,
    $EditSubParmValue4,
    $EditTestValue,

    $ErrorMessagEC,
    $ErrorMessageSpam,
    $ErrorNumber,
    $ErrorPrefix,
    $ErrorSequenceNumber,
    $ErrorSuffix,
    $ErrorsWritten,

    $FormCSVFileName,
    $FormEchoUser,
    $FormEmail,
    $FormEmailConfirmation,
    $FormEmailConfirmationField,
    $FormEmailConfirmationFieldLabel,
    $FormEmailField,
    $FormEmailFieldLabel,
    $FormEmailFieldList,

    $FormErrorPageCSSClassCount,
    $FormErrorPageErrorMsgClass,
    $FormErrorPageErrorMsgColor,
    $FormErrorPageErrorMsgFace,
    $FormErrorPageErrorMsgSize,
    $FormErrorPageFooterClass,
    $FormErrorPageFooterColor,
    $FormErrorPageFooterFace,
    $FormErrorPageFooterSize,
    $FormErrorPageHeading1,
    $FormErrorPageHeading1Bold,
    $FormErrorPageHeading1Class,
    $FormErrorPageHeading1Color,
    $FormErrorPageHeading1Face,
    $FormErrorPageHeading1Size,
    $FormErrorPageHeading2,
    $FormErrorPageHeading2Bold,
    $FormErrorPageHeading2Class,
    $FormErrorPageHeading2Color,
    $FormErrorPageHeading2Face,
    $FormErrorPageHeading2Size,
    $FormErrorPageLastCSSClassField,
    $FormErrorPageLastFormatField,
    $FormErrorPageLinEClosing,
    $FormErrorPageLinEClosingBold,
    $FormErrorPageLinEClosingClass,
    $FormErrorPageLinEClosingColor,
    $FormErrorPageLinEClosingFace,
    $FormErrorPageLinEClosingSize,
    $FormErrorPageLineOpening,
    $FormErrorPageLineOpeningBold,
    $FormErrorPageLineOpeningClass,
    $FormErrorPageLineOpeningColor,
    $FormErrorPageLineOpeningFace,    
    $FormErrorPageLineOpeningSize,
    $FormErrorPageTemplate,    
    $FormErrorPageTemplateContents,
    $FormErrorPageTitle,
    $FormErrorPageTrackingInfo,

    $FormFieldNameEditList,
    $FormFieldNameEditListArray,
    $FormFieldNameExcludEArray,
    $FormFieldNameLabelArray,
    $FormFieldNameLabelListArray,
    $FormFieldNameLabelPlusList,
    $FormFieldNameLabelPlusListArray,
    $FormFieldNameMinSizEArray,
    $FormFieldNameMaxSizEArray,
    $FormFieldNameRequiredArray,
    $FormName,
    $FormNamEField,
    $FormNameFieldList,
    $FormNextURL,
    $FormOutputFieldInfo,
    $FormPleaseForgiveMyUseOfAWindowsServer,
    $FormTestEmailDomain,
    $FormTestEmailFormat,
    $FormTestFieldMinLengths,
    $FormTestFieldMaxLengths,
    $FormTestInjectionExploits,

    $HoldMsg1AddrList,
    $HoldMsg1Subject,

    $HoldMsg2AddrList,
    $HoldMsg2Subject,

    $IP,
    $Message, 

    $Msg0AddrList,
    $Msg0DefaultFromAddr,
    $Msg0FieldLabelValueSeparator, 
    $Msg0FieldNameExcludEArray,
    $Msg0FieldNameExcludeListArray,
    $Msg0FieldNameLabelList,
    $Msg0FieldNameLabelListArray,
    $Msg0FieldNameLabelListArrayDefault,
    $Msg0FieldNameValueSubstitutionArray,
    $Msg0FieldNameValueSubstitutionList,
    $Msg0FieldValueTerminator,
    $Msg0ForcEDefaultFromAddr,
    $Msg0Subject,
    $Msg0TextBottom,
    $Msg0TextTop,

    $Msg1LabelSubjectAndAddressesDropDown,
    $Msg1AddrList,
    $Msg1AddrListAndSubjectSetByDropDown,
    $Msg1DefaultFromAddr,
    $Msg1FieldLabelValueSeparator,
    $Msg1FieldNameExcludeList,
    $Msg1FieldNameExcludeListArray,
    $Msg1FieldNameLabelList,
    $Msg1FieldNameLabelListArray,
    $Msg1FieldNameValueSubstitutionArray,
    $Msg1FieldNameValueSubstitutionList,
    $Msg1FieldNameValueSubstitutionList2,
    $Msg1ForcEDefaultFromAddr,
    $Msg1Subject,
    $Msg1SubjectField,
    $Msg1TextBottom,
    $Msg1TextTop,

    $Msg2LabelSubjectAndAddressesDropDown,
    $Msg2AddrList,
    $Msg2AddrListAndSubjectSetByDropDown,
    $Msg2DefaultFromAddr,
    $Msg2FieldLabelValueSeparator,
    $Msg2FieldNameExcludeList,
    $Msg2FieldNameExcludeListArray,
    $Msg2FieldNameLabelList,
    $Msg2FieldNameLabelListArray,
    $Msg2FieldNameValueSubstitutionArray,
    $Msg2FieldNameValueSubstitutionList,
    $Msg2FieldNameValueSubstitutionList2,
    $Msg2ForcEDefaultFromAddr,
    $Msg2Subject,
    $Msg2SubjectField,
    $Msg2TextBottom,
    $Msg2TextTop,

    $MsgEchoAddressee,
    $MsgEchoFromAddr,
    $MsgEchoFieldLabelValueSeparator,
    $MsgEchoFieldNameExcludeList,
    $MsgEchoFieldNameExcludeListArray,
    $MsgEchoFieldNameLabelList,
    $MsgEchoFieldNameLabelListArray,
    $MsgEchoFieldNameValueSubstitutionArray,
    $MsgEchoFieldNameValueSubstitutionList,
    $MsgEchoFieldNameValueSubstitutionLists,
    $MsgEchoSubject,
    $MsgEchoTextBottom,
    $MsgEchoTextTop,

    $MsgNumber,

    $NextURL,
    $PHPVersion,
    $Referer,
    $ProcessFormFieldNameLabelPlusListDone,
    $ScriptPathShort,
    $ScriptPathLong,
    $ScriptStartTime,    
    $ScriptVersion,
    $TemplateErrorPlacementString,
    $ValidFieldEditsArray;

$CheckString = "0123456789";
$ErrorFound = FALSE;

$EditFieldValueLength = strlen($EditFieldValue);
$EditCharValue = substr($EditFieldValue, 0, 1);

if ($EditFieldValueLength > 1 and ($EditCharValue == "+" or $EditCharValue == "-")) {
    $i = 1;
} else {
    $i = 0;
}

while ($i < $EditFieldValueLength) {
    $EditCharValue = substr($EditFieldValue, $i, 1);
    $Pos = strpos($CheckString, $EditCharValue); 

    if ($Pos === FALSE) {
        $EditCharPos = $i + 1;

        if ($EditCharValue != " ") {
            $EditCharFormatted = "\"$EditCharValue\"";
        } else {
            $EditCharFormatted = "a space";
        }

        return TRUE;

     } else {
        $i = $i + 1;    
     }
}

return FALSE;

}  //  End of EditInteger($EditFieldValue, &$EditCharValue, &$EditCharFormatted, &$EditCharPos)




//*************************************************************
//  FUNCTION: EditSubParmColor($PassedFieldName, $PassedFieldValue, $PassedSubFieldValue, $PassedSubFieldPos)
//*************************************************************

function EditSubParmColor ($PassedFieldName, $PassedFieldValue, $PassedSubFieldValue, $PassedSubFieldPos) {

//-------------------------------------------------------------
//  This a color specified in a subparameter.
//-------------------------------------------------------------

global 
    $at,
    $Browser,

    $CopyUser,

    $CRLF,

    $EditCharFormatted1,
    $EditCharPos1,
    $EditCharValue1,
    $EditEditValue1,   
    $EditEditPos1,    
    $EditFieldActualSize1,
    $EditFieldActualSize2,
    $EditFieldLabel1,
    $EditFieldLabel2,
    $EditFieldMaxSize1,
    $EditFieldMaxSize2,
    $EditFieldMinSize1,
    $EditFieldMinSize2,
    $EditFieldName1,    
    $EditFieldName2, 
    $EditFieldPos1,    
    $EditFieldPos2,    
    $EditFieldValue1,    
    $EditFieldValue2, 
    $EditLowValue,
    $EditHighValue,
    $EditParmName1,    
    $EditParmName2,
    $EditParmValue1,    
    $EditParmValue2,
    $EditParmValue3,
    $EditSubParmLabel1,
    $EditSubParm1LegalValues,
    $EditSubParmName1,
    $EditSubParmNum1,
    $EditSubParmNum2,
    $EditSubParmPos1,  
    $EditSubParmPos2,
    $EditSubParmPos3,
    $EditSubParmPos4,
    $EditSubParmValue1,    
    $EditSubParmValue2,
    $EditSubParmValue3,
    $EditSubParmValue4,
    $EditTestValue,

    $ErrorMessagEC,
    $ErrorMessageSpam,
    $ErrorNumber,
    $ErrorPrefix,
    $ErrorSequenceNumber,
    $ErrorSuffix,
    $ErrorsWritten,

    $FormCSVFileName,
    $FormEchoUser,
    $FormEmail,
    $FormEmailConfirmation,
    $FormEmailConfirmationField,
    $FormEmailConfirmationFieldLabel,
    $FormEmailField,
    $FormEmailFieldLabel,
    $FormEmailFieldList,

    $FormErrorPageCSSClassCount,
    $FormErrorPageErrorMsgClass,
    $FormErrorPageErrorMsgColor,
    $FormErrorPageErrorMsgFace,
    $FormErrorPageErrorMsgSize,
    $FormErrorPageFooterClass,
    $FormErrorPageFooterColor,
    $FormErrorPageFooterFace,
    $FormErrorPageFooterSize,
    $FormErrorPageHeading1,
    $FormErrorPageHeading1Bold,
    $FormErrorPageHeading1Class,
    $FormErrorPageHeading1Color,
    $FormErrorPageHeading1Face,
    $FormErrorPageHeading1Size,
    $FormErrorPageHeading2,
    $FormErrorPageHeading2Bold,
    $FormErrorPageHeading2Class,
    $FormErrorPageHeading2Color,
    $FormErrorPageHeading2Face,
    $FormErrorPageHeading2Size,
    $FormErrorPageLastCSSClassField,
    $FormErrorPageLastFormatField,
    $FormErrorPageLinEClosing,
    $FormErrorPageLinEClosingBold,
    $FormErrorPageLinEClosingClass,
    $FormErrorPageLinEClosingColor,
    $FormErrorPageLinEClosingFace,
    $FormErrorPageLinEClosingSize,
    $FormErrorPageLineOpening,
    $FormErrorPageLineOpeningBold,
    $FormErrorPageLineOpeningClass,
    $FormErrorPageLineOpeningColor,
    $FormErrorPageLineOpeningFace,    
    $FormErrorPageLineOpeningSize,
    $FormErrorPageTemplate,    
    $FormErrorPageTemplateContents,
    $FormErrorPageTitle,
    $FormErrorPageTrackingInfo,

    $FormFieldNameEditList,
    $FormFieldNameEditListArray,
    $FormFieldNameExcludEArray,
    $FormFieldNameLabelArray,
    $FormFieldNameLabelListArray,
    $FormFieldNameLabelPlusList,
    $FormFieldNameLabelPlusListArray,
    $FormFieldNameMinSizEArray,
    $FormFieldNameMaxSizEArray,
    $FormFieldNameRequiredArray,
    $FormName,
    $FormNamEField,
    $FormNameFieldList,
    $FormNextURL,
    $FormOutputFieldInfo,
    $FormPleaseForgiveMyUseOfAWindowsServer,
    $FormTestEmailDomain,
    $FormTestEmailFormat,
    $FormTestFieldMinLengths,
    $FormTestFieldMaxLengths,
    $FormTestInjectionExploits,

    $HoldMsg1AddrList,
    $HoldMsg1Subject,

    $HoldMsg2AddrList,
    $HoldMsg2Subject,

    $IP,
    $Message, 

    $Msg0AddrList,
    $Msg0DefaultFromAddr,
    $Msg0FieldLabelValueSeparator, 
    $Msg0FieldNameExcludEArray,
    $Msg0FieldNameExcludeListArray,
    $Msg0FieldNameLabelList,
    $Msg0FieldNameLabelListArray,
    $Msg0FieldNameLabelListArrayDefault,
    $Msg0FieldNameValueSubstitutionArray,
    $Msg0FieldNameValueSubstitutionList,
    $Msg0FieldValueTerminator,
    $Msg0ForcEDefaultFromAddr,
    $Msg0Subject,
    $Msg0TextBottom,
    $Msg0TextTop,

    $Msg1LabelSubjectAndAddressesDropDown,
    $Msg1AddrList,
    $Msg1AddrListAndSubjectSetByDropDown,
    $Msg1DefaultFromAddr,
    $Msg1FieldLabelValueSeparator,
    $Msg1FieldNameExcludeList,
    $Msg1FieldNameExcludeListArray,
    $Msg1FieldNameLabelList,
    $Msg1FieldNameLabelListArray,
    $Msg1FieldNameValueSubstitutionArray,
    $Msg1FieldNameValueSubstitutionList,
    $Msg1FieldNameValueSubstitutionList2,
    $Msg1ForcEDefaultFromAddr,
    $Msg1Subject,
    $Msg1SubjectField,
    $Msg1TextBottom,
    $Msg1TextTop,

    $Msg2LabelSubjectAndAddressesDropDown,
    $Msg2AddrList,
    $Msg2AddrListAndSubjectSetByDropDown,
    $Msg2DefaultFromAddr,
    $Msg2FieldLabelValueSeparator,
    $Msg2FieldNameExcludeList,
    $Msg2FieldNameExcludeListArray,
    $Msg2FieldNameLabelList,
    $Msg2FieldNameLabelListArray,
    $Msg2FieldNameValueSubstitutionArray,
    $Msg2FieldNameValueSubstitutionList,
    $Msg2FieldNameValueSubstitutionList2,
    $Msg2ForcEDefaultFromAddr,
    $Msg2Subject,
    $Msg2SubjectField,
    $Msg2TextBottom,
    $Msg2TextTop,

    $MsgEchoAddressee,
    $MsgEchoFromAddr,
    $MsgEchoFieldLabelValueSeparator,
    $MsgEchoFieldNameExcludeList,
    $MsgEchoFieldNameExcludeListArray,
    $MsgEchoFieldNameLabelList,
    $MsgEchoFieldNameLabelListArray,
    $MsgEchoFieldNameValueSubstitutionArray,
    $MsgEchoFieldNameValueSubstitutionList,
    $MsgEchoFieldNameValueSubstitutionLists,
    $MsgEchoSubject,
    $MsgEchoTextBottom,
    $MsgEchoTextTop,

    $MsgNumber,

    $NextURL,
    $PHPVersion,
    $Referer,
    $ProcessFormFieldNameLabelPlusListDone,
    $ScriptPathShort,
    $ScriptPathLong,
    $ScriptStartTime,    
    $ScriptVersion,
    $TemplateErrorPlacementString,
    $ValidFieldEditsArray;

$EditParmName1     = $PassedFieldName;
$EditParmValue1    = $PassedFieldValue;
$EditSubParmValue1 = $PassedSubFieldValue;
$EditSubParmPos1   = $PassedSubFieldPos;

EditColor($PassedSubFieldValue, $PassedErrorPos, $PassedErrorCode); 

if ($PassedErrorCode == "not # and not name") {
//    SetFormatValues ();
    WriteErrorMessage("C030"); 
}

if ($PassedErrorCode == "format - length") {
    // SetFormatValues ();
    WriteErrorMessage("C031"); 
}

if ($PassedErrorCode == "illegal hex #") {
    $EditCharPos1 = $PassedErrorPos;
    WriteErrorMessage("C032"); 
}

}  //  End of EditSubParmColor ($PassedFieldName, $PassedFieldValue, $PassedSubFieldValue, $PassedSubFieldPos)




//*************************************************************
//  FUNCTION: EditColor ($PassedColor, &$PassedErrorPos, &$PassedErrorCode)
//*************************************************************

function EditColor ($PassedColor, &$PassedErrorPos, &$PassedErrorCode) {

//-------------------------------------------------------------
//  Edit a color.
//-------------------------------------------------------------

global 
    $at,
    $Browser,

    $CopyUser,

    $CRLF,

    $EditCharFormatted1,
    $EditCharPos1,
    $EditCharValue1,
    $EditEditValue1,   
    $EditEditPos1,    
    $EditFieldActualSize1,
    $EditFieldActualSize2,
    $EditFieldLabel1,
    $EditFieldLabel2,
    $EditFieldMaxSize1,
    $EditFieldMaxSize2,
    $EditFieldMinSize1,
    $EditFieldMinSize2,
    $EditFieldName1,    
    $EditFieldName2, 
    $EditFieldPos1,    
    $EditFieldPos2,    
    $EditFieldValue1,    
    $EditFieldValue2, 
    $EditLowValue,
    $EditHighValue,
    $EditParmName1,    
    $EditParmName2,
    $EditParmValue1,    
    $EditParmValue2,
    $EditParmValue3,
    $EditSubParmLabel1,
    $EditSubParm1LegalValues,
    $EditSubParmName1,
    $EditSubParmNum1,
    $EditSubParmNum2,
    $EditSubParmPos1,  
    $EditSubParmPos2,
    $EditSubParmPos3,
    $EditSubParmPos4,
    $EditSubParmValue1,    
    $EditSubParmValue2,
    $EditSubParmValue3,
    $EditSubParmValue4,
    $EditTestValue,

    $ErrorMessagEC,
    $ErrorMessageSpam,
    $ErrorNumber,
    $ErrorPrefix,
    $ErrorSequenceNumber,
    $ErrorSuffix,
    $ErrorsWritten,

    $FormCSVFileName,
    $FormEchoUser,
    $FormEmail,
    $FormEmailConfirmation,
    $FormEmailConfirmationField,
    $FormEmailConfirmationFieldLabel,
    $FormEmailField,
    $FormEmailFieldLabel,
    $FormEmailFieldList,

    $FormErrorPageCSSClassCount,
    $FormErrorPageErrorMsgClass,
    $FormErrorPageErrorMsgColor,
    $FormErrorPageErrorMsgFace,
    $FormErrorPageErrorMsgSize,
    $FormErrorPageFooterClass,
    $FormErrorPageFooterColor,
    $FormErrorPageFooterFace,
    $FormErrorPageFooterSize,
    $FormErrorPageHeading1,
    $FormErrorPageHeading1Bold,
    $FormErrorPageHeading1Class,
    $FormErrorPageHeading1Color,
    $FormErrorPageHeading1Face,
    $FormErrorPageHeading1Size,
    $FormErrorPageHeading2,
    $FormErrorPageHeading2Bold,
    $FormErrorPageHeading2Class,
    $FormErrorPageHeading2Color,
    $FormErrorPageHeading2Face,
    $FormErrorPageHeading2Size,
    $FormErrorPageLastCSSClassField,
    $FormErrorPageLastFormatField,
    $FormErrorPageLinEClosing,
    $FormErrorPageLinEClosingBold,
    $FormErrorPageLinEClosingClass,
    $FormErrorPageLinEClosingColor,
    $FormErrorPageLinEClosingFace,
    $FormErrorPageLinEClosingSize,
    $FormErrorPageLineOpening,
    $FormErrorPageLineOpeningBold,
    $FormErrorPageLineOpeningClass,
    $FormErrorPageLineOpeningColor,
    $FormErrorPageLineOpeningFace,    
    $FormErrorPageLineOpeningSize,
    $FormErrorPageTemplate,    
    $FormErrorPageTemplateContents,
    $FormErrorPageTitle,
    $FormErrorPageTrackingInfo,

    $FormFieldNameEditList,
    $FormFieldNameEditListArray,
    $FormFieldNameExcludEArray,
    $FormFieldNameLabelArray,
    $FormFieldNameLabelListArray,
    $FormFieldNameLabelPlusList,
    $FormFieldNameLabelPlusListArray,
    $FormFieldNameMinSizEArray,
    $FormFieldNameMaxSizEArray,
    $FormFieldNameRequiredArray,
    $FormName,
    $FormNamEField,
    $FormNameFieldList,
    $FormNextURL,
    $FormOutputFieldInfo,
    $FormPleaseForgiveMyUseOfAWindowsServer,
    $FormTestEmailDomain,
    $FormTestEmailFormat,
    $FormTestFieldMinLengths,
    $FormTestFieldMaxLengths,
    $FormTestInjectionExploits,

    $HoldMsg1AddrList,
    $HoldMsg1Subject,

    $HoldMsg2AddrList,
    $HoldMsg2Subject,

    $IP,
    $Message, 

    $Msg0AddrList,
    $Msg0DefaultFromAddr,
    $Msg0FieldLabelValueSeparator, 
    $Msg0FieldNameExcludEArray,
    $Msg0FieldNameExcludeListArray,
    $Msg0FieldNameLabelList,
    $Msg0FieldNameLabelListArray,
    $Msg0FieldNameLabelListArrayDefault,
    $Msg0FieldNameValueSubstitutionArray,
    $Msg0FieldNameValueSubstitutionList,
    $Msg0FieldValueTerminator,
    $Msg0ForcEDefaultFromAddr,
    $Msg0Subject,
    $Msg0TextBottom,
    $Msg0TextTop,

    $Msg1LabelSubjectAndAddressesDropDown,
    $Msg1AddrList,
    $Msg1AddrListAndSubjectSetByDropDown,
    $Msg1DefaultFromAddr,
    $Msg1FieldLabelValueSeparator,
    $Msg1FieldNameExcludeList,
    $Msg1FieldNameExcludeListArray,
    $Msg1FieldNameLabelList,
    $Msg1FieldNameLabelListArray,
    $Msg1FieldNameValueSubstitutionArray,
    $Msg1FieldNameValueSubstitutionList,
    $Msg1FieldNameValueSubstitutionList2,
    $Msg1ForcEDefaultFromAddr,
    $Msg1Subject,
    $Msg1SubjectField,
    $Msg1TextBottom,
    $Msg1TextTop,

    $Msg2LabelSubjectAndAddressesDropDown,
    $Msg2AddrList,
    $Msg2AddrListAndSubjectSetByDropDown,
    $Msg2DefaultFromAddr,
    $Msg2FieldLabelValueSeparator,
    $Msg2FieldNameExcludeList,
    $Msg2FieldNameExcludeListArray,
    $Msg2FieldNameLabelList,
    $Msg2FieldNameLabelListArray,
    $Msg2FieldNameValueSubstitutionArray,
    $Msg2FieldNameValueSubstitutionList,
    $Msg2FieldNameValueSubstitutionList2,
    $Msg2ForcEDefaultFromAddr,
    $Msg2Subject,
    $Msg2SubjectField,
    $Msg2TextBottom,
    $Msg2TextTop,

    $MsgEchoAddressee,
    $MsgEchoFromAddr,
    $MsgEchoFieldLabelValueSeparator,
    $MsgEchoFieldNameExcludeList,
    $MsgEchoFieldNameExcludeListArray,
    $MsgEchoFieldNameLabelList,
    $MsgEchoFieldNameLabelListArray,
    $MsgEchoFieldNameValueSubstitutionArray,
    $MsgEchoFieldNameValueSubstitutionList,
    $MsgEchoFieldNameValueSubstitutionLists,
    $MsgEchoSubject,
    $MsgEchoTextBottom,
    $MsgEchoTextTop,

    $MsgNumber,

    $NextURL,
    $PHPVersion,
    $Referer,
    $ProcessFormFieldNameLabelPlusListDone,
    $ScriptPathShort,
    $ScriptPathLong,
    $ScriptStartTime,    
    $ScriptVersion,
    $TemplateErrorPlacementString,
    $ValidFieldEditsArray;

$PassedErrorCode = "ok";
$PassedErrorPos = 0;

$TestColors = array("black", "silver", "gray", "white", "maroon", "red", "purple", "fuchsia", "green", "lime", "olive", "yellow", "navy", "blue", "teal", "aqua");

if (substr ($PassedColor, 0, 1) <> "#") {
    if (in_array ($PassedColor, $TestColors)) {
        return;
    } else {
        $PassedErrorCode = "not # and not name";
        return;
    }    
} elseif (strlen($PassedColor) <> 7) {
    $PassedErrorCode = "format - length";
    return;
} else {
    $TestChars = "0123456789ABCDEFabcdef";
    $LenTestChars = strlen ($TestChars);
    $i = 1;
    while ($i < 7) {
        $Temp2 = substr ($PassedColor, $i, 1); 
        $j = 0;
        while ($j < $LenTestChars) {
            $Temp3 = substr ($TestChars, $j, 1);
            if ($Temp2 == $Temp3) {
                $j = $LenTestChars;
            } else {
                $j = $j + 1;
                if ($j == $LenTestChars) {
                    $PassedErrorCode = "illegal hex #";
                    $PassedErrorPos = $i + 1;
                    return;
                }    
            } 
        }     
        $i = $i + 1;
    }
}    

}  //  End of EditColor($PassedColor, &$PassedErrorPos, &$PassedErrorCode) 




//*************************************************************
//  FUNCTION: SetFormatValues
//*************************************************************

function SetFormatValues () {

//-------------------------------------------------------------
//  Set the format values.
//-------------------------------------------------------------

global
    $at,
    $Browser,

    $CopyUser,

    $CRLF,

    $EditCharFormatted1,
    $EditCharPos1,
    $EditCharValue1,
    $EditEditValue1,   
    $EditEditPos1,    
    $EditFieldActualSize1,
    $EditFieldActualSize2,
    $EditFieldLabel1,
    $EditFieldLabel2,
    $EditFieldMaxSize1,
    $EditFieldMaxSize2,
    $EditFieldMinSize1,
    $EditFieldMinSize2,
    $EditFieldName1,    
    $EditFieldName2, 
    $EditFieldPos1,    
    $EditFieldPos2,    
    $EditFieldValue1,    
    $EditFieldValue2, 
    $EditLowValue,
    $EditHighValue,
    $EditParmName1,    
    $EditParmName2,
    $EditParmValue1,    
    $EditParmValue2,
    $EditParmValue3,
    $EditSubParmLabel1,
    $EditSubParm1LegalValues,
    $EditSubParmName1,
    $EditSubParmNum1,
    $EditSubParmNum2,
    $EditSubParmPos1,  
    $EditSubParmPos2,
    $EditSubParmPos3,
    $EditSubParmPos4,
    $EditSubParmValue1,    
    $EditSubParmValue2,
    $EditSubParmValue3,
    $EditSubParmValue4,
    $EditTestValue,

    $ErrorMessagEC,
    $ErrorMessageSpam,
    $ErrorNumber,
    $ErrorPrefix,
    $ErrorSequenceNumber,
    $ErrorSuffix,
    $ErrorsWritten,

    $FormCSVFileName,
    $FormEchoUser,
    $FormEmail,
    $FormEmailConfirmation,
    $FormEmailConfirmationField,
    $FormEmailConfirmationFieldLabel,
    $FormEmailField,
    $FormEmailFieldLabel,
    $FormEmailFieldList,

    $FormErrorPageCSSClassCount,
    $FormErrorPageErrorMsgClass,
    $FormErrorPageErrorMsgColor,
    $FormErrorPageErrorMsgFace,
    $FormErrorPageErrorMsgSize,
    $FormErrorPageFooterClass,
    $FormErrorPageFooterColor,
    $FormErrorPageFooterFace,
    $FormErrorPageFooterSize,
    $FormErrorPageHeading1,
    $FormErrorPageHeading1Bold,
    $FormErrorPageHeading1Class,
    $FormErrorPageHeading1Color,
    $FormErrorPageHeading1Face,
    $FormErrorPageHeading1Size,
    $FormErrorPageHeading2,
    $FormErrorPageHeading2Bold,
    $FormErrorPageHeading2Class,
    $FormErrorPageHeading2Color,
    $FormErrorPageHeading2Face,
    $FormErrorPageHeading2Size,
    $FormErrorPageLastCSSClassField,
    $FormErrorPageLastFormatField,
    $FormErrorPageLinEClosing,
    $FormErrorPageLinEClosingBold,
    $FormErrorPageLinEClosingClass,
    $FormErrorPageLinEClosingColor,
    $FormErrorPageLinEClosingFace,
    $FormErrorPageLinEClosingSize,
    $FormErrorPageLineOpening,
    $FormErrorPageLineOpeningBold,
    $FormErrorPageLineOpeningClass,
    $FormErrorPageLineOpeningColor,
    $FormErrorPageLineOpeningFace,    
    $FormErrorPageLineOpeningSize,
    $FormErrorPageTemplate,    
    $FormErrorPageTemplateContents,
    $FormErrorPageTitle,
    $FormErrorPageTrackingInfo,

    $FormFieldNameEditList,
    $FormFieldNameEditListArray,
    $FormFieldNameExcludEArray,
    $FormFieldNameLabelArray,
    $FormFieldNameLabelListArray,
    $FormFieldNameLabelPlusList,
    $FormFieldNameLabelPlusListArray,
    $FormFieldNameMinSizEArray,
    $FormFieldNameMaxSizEArray,
    $FormFieldNameRequiredArray,
    $FormName,
    $FormNamEField,
    $FormNameFieldList,
    $FormNextURL,
    $FormOutputFieldInfo,
    $FormPleaseForgiveMyUseOfAWindowsServer,
    $FormTestEmailDomain,
    $FormTestEmailFormat,
    $FormTestFieldMinLengths,
    $FormTestFieldMaxLengths,
    $FormTestInjectionExploits,

    $HoldMsg1AddrList,
    $HoldMsg1Subject,

    $HoldMsg2AddrList,
    $HoldMsg2Subject,

    $IP,
    $Message, 

    $Msg0AddrList,
    $Msg0DefaultFromAddr,
    $Msg0FieldLabelValueSeparator, 
    $Msg0FieldNameExcludEArray,
    $Msg0FieldNameExcludeListArray,
    $Msg0FieldNameLabelList,
    $Msg0FieldNameLabelListArray,
    $Msg0FieldNameLabelListArrayDefault,
    $Msg0FieldNameValueSubstitutionArray,
    $Msg0FieldNameValueSubstitutionList,
    $Msg0FieldValueTerminator,
    $Msg0ForcEDefaultFromAddr,
    $Msg0Subject,
    $Msg0TextBottom,
    $Msg0TextTop,

    $Msg1LabelSubjectAndAddressesDropDown,
    $Msg1AddrList,
    $Msg1AddrListAndSubjectSetByDropDown,
    $Msg1DefaultFromAddr,
    $Msg1FieldLabelValueSeparator,
    $Msg1FieldNameExcludeList,
    $Msg1FieldNameExcludeListArray,
    $Msg1FieldNameLabelList,
    $Msg1FieldNameLabelListArray,
    $Msg1FieldNameValueSubstitutionArray,
    $Msg1FieldNameValueSubstitutionList,
    $Msg1FieldNameValueSubstitutionList2,
    $Msg1ForcEDefaultFromAddr,
    $Msg1Subject,
    $Msg1SubjectField,
    $Msg1TextBottom,
    $Msg1TextTop,

    $Msg2LabelSubjectAndAddressesDropDown,
    $Msg2AddrList,
    $Msg2AddrListAndSubjectSetByDropDown,
    $Msg2DefaultFromAddr,
    $Msg2FieldLabelValueSeparator,
    $Msg2FieldNameExcludeList,
    $Msg2FieldNameExcludeListArray,
    $Msg2FieldNameLabelList,
    $Msg2FieldNameLabelListArray,
    $Msg2FieldNameValueSubstitutionArray,
    $Msg2FieldNameValueSubstitutionList,
    $Msg2FieldNameValueSubstitutionList2,
    $Msg2ForcEDefaultFromAddr,
    $Msg2Subject,
    $Msg2SubjectField,
    $Msg2TextBottom,
    $Msg2TextTop,

    $MsgEchoAddressee,
    $MsgEchoFromAddr,
    $MsgEchoFieldLabelValueSeparator,
    $MsgEchoFieldNameExcludeList,
    $MsgEchoFieldNameExcludeListArray,
    $MsgEchoFieldNameLabelList,
    $MsgEchoFieldNameLabelListArray,
    $MsgEchoFieldNameValueSubstitutionArray,
    $MsgEchoFieldNameValueSubstitutionList,
    $MsgEchoFieldNameValueSubstitutionLists,
    $MsgEchoSubject,
    $MsgEchoTextBottom,
    $MsgEchoTextTop,

    $MsgNumber,

    $NextURL,
    $PHPVersion,
    $Referer,
    $ProcessFormFieldNameLabelPlusListDone,
    $ScriptPathShort,
    $ScriptPathLong,
    $ScriptStartTime,    
    $ScriptVersion,
    $TemplateErrorPlacementString,
    $ValidFieldEditsArray;

$FormErrorPageErrorMsgClass    = "";
$FormErrorPageErrorMsgFace     = "Georgia, serif";
$FormErrorPageErrorMsgSize     = "2";
$FormErrorPageErrorMsgColor    = "red";

$FormErrorPageFooterClass      = "";
$FormErrorPageFooterFace       = "Tahoma, Arial, Helvetica, sans-serif";
$FormErrorPageFooterSize       = "1";
$FormErrorPageFooterColor      = "#000000";

$FormErrorPageHeading1         = "HUGGINS' Email Form Script";
$FormErrorPageHeading1Class    = "";
$FormErrorPageHeading1Face     = "Tahoma, Arial, Helvetica, sans-serif";
$FormErrorPageHeading1Size     = "5";
$FormErrorPageHeading1Color    = "#000000";
$FormErrorPageHeading1Bold     = "yes";

$FormErrorPageHeading2         = "Form Processing Error Page";
$FormErrorPageHeading2Class    = "";
$FormErrorPageHeading2Face     = "Tahoma, Arial, Helvetica, sans-serif";
$FormErrorPageHeading2Size     = "4";
$FormErrorPageHeading2Color    = "#000000";
$FormErrorPageHeading2Bold     = "yes";

$FormErrorPageLinEClosing      = "Please press the \"Back\" button, correct the errors and resubmit.";
$FormErrorPageLinEClosingClass = "";
$FormErrorPageLinEClosingFace  = "Tahoma, Arial, Helvetica, sans-serif";
$FormErrorPageLinEClosingSize  = "2";
$FormErrorPageLinEClosingColor = "#000000";
$FormErrorPageLinEClosingBold  = "yes";

$FormErrorPageLineOpening      = "The form you submitted had the following errors:";
$FormErrorPageLineOpeningClass = "";
$FormErrorPageLineOpeningFace  = "Tahoma, Arial, Helvetica, sans-serif";
$FormErrorPageLineOpeningSize  = "2";
$FormErrorPageLineOpeningColor = "#000000";
$FormErrorPageLineOpeningBold  = "yes";

$FormErrorPageTemplate         = "";
$FormErrorPageTemplateContents = "";
$FormErrorPageTitle            = "Error Page - Huggins' Email Form Script";
$FormErrorPageTrackingInfo     = "";

}  //  End of SetFormatValues ()  		




//*************************************************************
//  FUNCTION: EditNumber($PassedFieldValue, &$PassedCharFormatted, &$PassedCharPos, $PassedLowValue, $PassedHighValue, &$PassedErrorCode)
//*************************************************************

function EditNumber($PassedFieldValue, &$PassedCharFormatted, &$PassedCharPos, $PassedLowValue, $PassedHighValue, &$PassedErrorCode) {

//-------------------------------------------------------------
//  Edit a number.
//-------------------------------------------------------------

global 
    $at,
    $Browser,

    $CopyUser,

    $CRLF,

    $EditCharFormatted1,
    $EditCharPos1,
    $EditCharValue1,
    $EditEditValue1,   
    $EditEditPos1,    
    $EditFieldActualSize1,
    $EditFieldActualSize2,
    $EditFieldLabel1,
    $EditFieldLabel2,
    $EditFieldMaxSize1,
    $EditFieldMaxSize2,
    $EditFieldMinSize1,
    $EditFieldMinSize2,
    $EditFieldName1,    
    $EditFieldName2, 
    $EditFieldPos1,    
    $EditFieldPos2,    
    $EditFieldValue1,    
    $EditFieldValue2, 
    $EditLowValue,
    $EditHighValue,
    $EditParmName1,    
    $EditParmName2,
    $EditParmValue1,    
    $EditParmValue2,
    $EditParmValue3,
    $EditSubParmLabel1,
    $EditSubParm1LegalValues,
    $EditSubParmName1,
    $EditSubParmNum1,
    $EditSubParmNum2,
    $EditSubParmPos1,  
    $EditSubParmPos2,
    $EditSubParmPos3,
    $EditSubParmPos4,
    $EditSubParmValue1,    
    $EditSubParmValue2,
    $EditSubParmValue3,
    $EditSubParmValue4,
    $EditTestValue,

    $ErrorMessagEC,
    $ErrorMessageSpam,
    $ErrorNumber,
    $ErrorPrefix,
    $ErrorSequenceNumber,
    $ErrorSuffix,
    $ErrorsWritten,

    $FormCSVFileName,
    $FormEchoUser,
    $FormEmail,
    $FormEmailConfirmation,
    $FormEmailConfirmationField,
    $FormEmailConfirmationFieldLabel,
    $FormEmailField,
    $FormEmailFieldLabel,
    $FormEmailFieldList,

    $FormErrorPageCSSClassCount,
    $FormErrorPageErrorMsgClass,
    $FormErrorPageErrorMsgColor,
    $FormErrorPageErrorMsgFace,
    $FormErrorPageErrorMsgSize,
    $FormErrorPageFooterClass,
    $FormErrorPageFooterColor,
    $FormErrorPageFooterFace,
    $FormErrorPageFooterSize,
    $FormErrorPageHeading1,
    $FormErrorPageHeading1Bold,
    $FormErrorPageHeading1Class,
    $FormErrorPageHeading1Color,
    $FormErrorPageHeading1Face,
    $FormErrorPageHeading1Size,
    $FormErrorPageHeading2,
    $FormErrorPageHeading2Bold,
    $FormErrorPageHeading2Class,
    $FormErrorPageHeading2Color,
    $FormErrorPageHeading2Face,
    $FormErrorPageHeading2Size,
    $FormErrorPageLastCSSClassField,
    $FormErrorPageLastFormatField,
    $FormErrorPageLinEClosing,
    $FormErrorPageLinEClosingBold,
    $FormErrorPageLinEClosingClass,
    $FormErrorPageLinEClosingColor,
    $FormErrorPageLinEClosingFace,
    $FormErrorPageLinEClosingSize,
    $FormErrorPageLineOpening,
    $FormErrorPageLineOpeningBold,
    $FormErrorPageLineOpeningClass,
    $FormErrorPageLineOpeningColor,
    $FormErrorPageLineOpeningFace,    
    $FormErrorPageLineOpeningSize,
    $FormErrorPageTemplate,    
    $FormErrorPageTemplateContents,
    $FormErrorPageTitle,
    $FormErrorPageTrackingInfo,

    $FormFieldNameEditList,
    $FormFieldNameEditListArray,
    $FormFieldNameExcludEArray,
    $FormFieldNameLabelArray,
    $FormFieldNameLabelListArray,
    $FormFieldNameLabelPlusList,
    $FormFieldNameLabelPlusListArray,
    $FormFieldNameMinSizEArray,
    $FormFieldNameMaxSizEArray,
    $FormFieldNameRequiredArray,
    $FormName,
    $FormNamEField,
    $FormNameFieldList,
    $FormNextURL,
    $FormOutputFieldInfo,
    $FormPleaseForgiveMyUseOfAWindowsServer,
    $FormTestEmailDomain,
    $FormTestEmailFormat,
    $FormTestFieldMinLengths,
    $FormTestFieldMaxLengths,
    $FormTestInjectionExploits,

    $HoldMsg1AddrList,
    $HoldMsg1Subject,

    $HoldMsg2AddrList,
    $HoldMsg2Subject,

    $IP,
    $Message, 

    $Msg0AddrList,
    $Msg0DefaultFromAddr,
    $Msg0FieldLabelValueSeparator, 
    $Msg0FieldNameExcludEArray,
    $Msg0FieldNameExcludeListArray,
    $Msg0FieldNameLabelList,
    $Msg0FieldNameLabelListArray,
    $Msg0FieldNameLabelListArrayDefault,
    $Msg0FieldNameValueSubstitutionArray,
    $Msg0FieldNameValueSubstitutionList,
    $Msg0FieldValueTerminator,
    $Msg0ForcEDefaultFromAddr,
    $Msg0Subject,
    $Msg0TextBottom,
    $Msg0TextTop,

    $Msg1LabelSubjectAndAddressesDropDown,
    $Msg1AddrList,
    $Msg1AddrListAndSubjectSetByDropDown,
    $Msg1DefaultFromAddr,
    $Msg1FieldLabelValueSeparator,
    $Msg1FieldNameExcludeList,
    $Msg1FieldNameExcludeListArray,
    $Msg1FieldNameLabelList,
    $Msg1FieldNameLabelListArray,
    $Msg1FieldNameValueSubstitutionArray,
    $Msg1FieldNameValueSubstitutionList,
    $Msg1FieldNameValueSubstitutionList2,
    $Msg1ForcEDefaultFromAddr,
    $Msg1Subject,
    $Msg1SubjectField,
    $Msg1TextBottom,
    $Msg1TextTop,

    $Msg2LabelSubjectAndAddressesDropDown,
    $Msg2AddrList,
    $Msg2AddrListAndSubjectSetByDropDown,
    $Msg2DefaultFromAddr,
    $Msg2FieldLabelValueSeparator,
    $Msg2FieldNameExcludeList,
    $Msg2FieldNameExcludeListArray,
    $Msg2FieldNameLabelList,
    $Msg2FieldNameLabelListArray,
    $Msg2FieldNameValueSubstitutionArray,
    $Msg2FieldNameValueSubstitutionList,
    $Msg2FieldNameValueSubstitutionList2,
    $Msg2ForcEDefaultFromAddr,
    $Msg2Subject,
    $Msg2SubjectField,
    $Msg2TextBottom,
    $Msg2TextTop,

    $MsgEchoAddressee,
    $MsgEchoFromAddr,
    $MsgEchoFieldLabelValueSeparator,
    $MsgEchoFieldNameExcludeList,
    $MsgEchoFieldNameExcludeListArray,
    $MsgEchoFieldNameLabelList,
    $MsgEchoFieldNameLabelListArray,
    $MsgEchoFieldNameValueSubstitutionArray,
    $MsgEchoFieldNameValueSubstitutionList,
    $MsgEchoFieldNameValueSubstitutionLists,
    $MsgEchoSubject,
    $MsgEchoTextBottom,
    $MsgEchoTextTop,

    $MsgNumber,

    $NextURL,
    $PHPVersion,
    $Referer,
    $ProcessFormFieldNameLabelPlusListDone,
    $ScriptPathShort,
    $ScriptPathLong,
    $ScriptStartTime,    
    $ScriptVersion,
    $TemplateErrorPlacementString,
    $ValidFieldEditsArray;

$CheckString = "0123456789.";
$ErrorFound = FALSE;

$PassedErrorCode = "no error";

$PassedFieldValueLength = strlen($PassedFieldValue);
$Char = substr($PassedFieldValue, 0, 1);
if ($PassedFieldValueLength > 1 and ($Char == "+" or $Char == "-")) {
    $i = 1;
} else {
    $i = 0;
}
while ($i < $PassedFieldValueLength) {
    $Char = substr($PassedFieldValue, $i, 1);
    $Pos = strpos($CheckString, $Char);
    if ($Pos === FALSE) {
        $PassedCharPos = $i + 1;
        if ($Char != " ") {
            $PassedCharFormatted = "\"$Char\"";
        } else {
            $PassedCharFormatted = "a space";
        }
        $PassedErrorCode = "illegal char"; 

        $ErrorFound = TRUE;
        $i = $PassedFieldValueLength;
    } else {
        $i = $i + 1;
    }
}

if (! $ErrorFound) {
    if (substr_count($PassedFieldValue, ".") > 1) {
    $PassedErrorCode = "too many decimals";     
    $ErrorFound = TRUE;
    $Key=$Key+2;
    }
}
if (! $ErrorFound) {
    $EditTestValue = 0 + $PassedFieldValue;
    $EditLowValue = 0 + trim($PassedLowValue);
    $Key = $Key + 1;
    $EditHighValue = 0 + trim($PassedHighValue);
    $Key = $Key + 1;
    if ($EditTestValue < $EditLowValue) {
        $PassedErrorCode = "too low";
    } elseif ($EditTestValue > $EditHighValue) {
        $PassedErrorCode = "too high";
    }
} else {
    $Key = $Key + 2;
}

}  //  End of EditNumber($PassedFieldValue, &$PassedCharFormatted, &$PassedCharPos, $PassedLowValue, $PassedHighValue, &$PassedErrorCode)




//*************************************************************
//  FUNCTION: EditSubParmNumber($PassedFieldName, $PassedFieldValue, $PassedSubFieldValue, $PassedSubFieldPos)
//*************************************************************

function EditSubParmNumber($PassedFieldName, $PassedFieldValue, $PassedSubFieldValue, $PassedSubFieldPos) {

//-------------------------------------------------------------
//  Edit a number.
//-------------------------------------------------------------

global
    $at,
    $Browser,

    $CopyUser,

    $CRLF,

    $EditCharFormatted1,
    $EditCharPos1,
    $EditCharValue1,
    $EditEditValue1,   
    $EditEditPos1,    
    $EditFieldActualSize1,
    $EditFieldActualSize2,
    $EditFieldLabel1,
    $EditFieldLabel2,
    $EditFieldMaxSize1,
    $EditFieldMaxSize2,
    $EditFieldMinSize1,
    $EditFieldMinSize2,
    $EditFieldName1,    
    $EditFieldName2, 
    $EditFieldPos1,    
    $EditFieldPos2,    
    $EditFieldValue1,    
    $EditFieldValue2, 
    $EditLowValue,
    $EditHighValue,
    $EditParmName1,    
    $EditParmName2,
    $EditParmValue1,    
    $EditParmValue2,
    $EditParmValue3,
    $EditSubParmLabel1,
    $EditSubParm1LegalValues,
    $EditSubParmName1,
    $EditSubParmNum1,
    $EditSubParmNum2,
    $EditSubParmPos1,  
    $EditSubParmPos2,
    $EditSubParmPos3,
    $EditSubParmPos4,
    $EditSubParmValue1,    
    $EditSubParmValue2,
    $EditSubParmValue3,
    $EditSubParmValue4,
    $EditTestValue,

    $ErrorMessagEC,
    $ErrorMessageSpam,
    $ErrorNumber,
    $ErrorPrefix,
    $ErrorSequenceNumber,
    $ErrorSuffix,
    $ErrorsWritten,

    $FormCSVFileName,
    $FormEchoUser,
    $FormEmail,
    $FormEmailConfirmation,
    $FormEmailConfirmationField,
    $FormEmailConfirmationFieldLabel,
    $FormEmailField,
    $FormEmailFieldLabel,
    $FormEmailFieldList,

    $FormErrorPageCSSClassCount,
    $FormErrorPageErrorMsgClass,
    $FormErrorPageErrorMsgColor,
    $FormErrorPageErrorMsgFace,
    $FormErrorPageErrorMsgSize,
    $FormErrorPageFooterClass,
    $FormErrorPageFooterColor,
    $FormErrorPageFooterFace,
    $FormErrorPageFooterSize,
    $FormErrorPageHeading1,
    $FormErrorPageHeading1Bold,
    $FormErrorPageHeading1Class,
    $FormErrorPageHeading1Color,
    $FormErrorPageHeading1Face,
    $FormErrorPageHeading1Size,
    $FormErrorPageHeading2,
    $FormErrorPageHeading2Bold,
    $FormErrorPageHeading2Class,
    $FormErrorPageHeading2Color,
    $FormErrorPageHeading2Face,
    $FormErrorPageHeading2Size,
    $FormErrorPageLastCSSClassField,
    $FormErrorPageLastFormatField,
    $FormErrorPageLinEClosing,
    $FormErrorPageLinEClosingBold,
    $FormErrorPageLinEClosingClass,
    $FormErrorPageLinEClosingColor,
    $FormErrorPageLinEClosingFace,
    $FormErrorPageLinEClosingSize,
    $FormErrorPageLineOpening,
    $FormErrorPageLineOpeningBold,
    $FormErrorPageLineOpeningClass,
    $FormErrorPageLineOpeningColor,
    $FormErrorPageLineOpeningFace,    
    $FormErrorPageLineOpeningSize,
    $FormErrorPageTemplate,    
    $FormErrorPageTemplateContents,
    $FormErrorPageTitle,
    $FormErrorPageTrackingInfo,

    $FormFieldNameEditList,
    $FormFieldNameEditListArray,
    $FormFieldNameExcludEArray,
    $FormFieldNameLabelArray,
    $FormFieldNameLabelListArray,
    $FormFieldNameLabelPlusList,
    $FormFieldNameLabelPlusListArray,
    $FormFieldNameMinSizEArray,
    $FormFieldNameMaxSizEArray,
    $FormFieldNameRequiredArray,
    $FormName,
    $FormNamEField,
    $FormNameFieldList,
    $FormNextURL,
    $FormOutputFieldInfo,
    $FormPleaseForgiveMyUseOfAWindowsServer,
    $FormTestEmailDomain,
    $FormTestEmailFormat,
    $FormTestFieldMinLengths,
    $FormTestFieldMaxLengths,
    $FormTestInjectionExploits,

    $HoldMsg1AddrList,
    $HoldMsg1Subject,

    $HoldMsg2AddrList,
    $HoldMsg2Subject,

    $IP,
    $Message, 

    $Msg0AddrList,
    $Msg0DefaultFromAddr,
    $Msg0FieldLabelValueSeparator, 
    $Msg0FieldNameExcludEArray,
    $Msg0FieldNameExcludeListArray,
    $Msg0FieldNameLabelList,
    $Msg0FieldNameLabelListArray,
    $Msg0FieldNameLabelListArrayDefault,
    $Msg0FieldNameValueSubstitutionArray,
    $Msg0FieldNameValueSubstitutionList,
    $Msg0FieldValueTerminator,
    $Msg0ForcEDefaultFromAddr,
    $Msg0Subject,
    $Msg0TextBottom,
    $Msg0TextTop,

    $Msg1LabelSubjectAndAddressesDropDown,
    $Msg1AddrList,
    $Msg1AddrListAndSubjectSetByDropDown,
    $Msg1DefaultFromAddr,
    $Msg1FieldLabelValueSeparator,
    $Msg1FieldNameExcludeList,
    $Msg1FieldNameExcludeListArray,
    $Msg1FieldNameLabelList,
    $Msg1FieldNameLabelListArray,
    $Msg1FieldNameValueSubstitutionArray,
    $Msg1FieldNameValueSubstitutionList,
    $Msg1FieldNameValueSubstitutionList2,
    $Msg1ForcEDefaultFromAddr,
    $Msg1Subject,
    $Msg1SubjectField,
    $Msg1TextBottom,
    $Msg1TextTop,

    $Msg2LabelSubjectAndAddressesDropDown,
    $Msg2AddrList,
    $Msg2AddrListAndSubjectSetByDropDown,
    $Msg2DefaultFromAddr,
    $Msg2FieldLabelValueSeparator,
    $Msg2FieldNameExcludeList,
    $Msg2FieldNameExcludeListArray,
    $Msg2FieldNameLabelList,
    $Msg2FieldNameLabelListArray,
    $Msg2FieldNameValueSubstitutionArray,
    $Msg2FieldNameValueSubstitutionList,
    $Msg2FieldNameValueSubstitutionList2,
    $Msg2ForcEDefaultFromAddr,
    $Msg2Subject,
    $Msg2SubjectField,
    $Msg2TextBottom,
    $Msg2TextTop,

    $MsgEchoAddressee,
    $MsgEchoFromAddr,
    $MsgEchoFieldLabelValueSeparator,
    $MsgEchoFieldNameExcludeList,
    $MsgEchoFieldNameExcludeListArray,
    $MsgEchoFieldNameLabelList,
    $MsgEchoFieldNameLabelListArray,
    $MsgEchoFieldNameValueSubstitutionArray,
    $MsgEchoFieldNameValueSubstitutionList,
    $MsgEchoFieldNameValueSubstitutionLists,
    $MsgEchoSubject,
    $MsgEchoTextBottom,
    $MsgEchoTextTop,

    $MsgNumber,

    $NextURL,
    $PHPVersion,
    $Referer,
    $ProcessFormFieldNameLabelPlusListDone,
    $ScriptPathShort,
    $ScriptPathLong,
    $ScriptStartTime,    
    $ScriptVersion,
    $TemplateErrorPlacementString,
    $ValidFieldEditsArray;

$EditParmName1     = $PassedFieldName;
$EditParmValue1    = $PassedFieldValue;
$EditSubParmValue1 = $PassedSubFieldValue;
$EditSubParmPos1   = $PassedSubFieldPos;

$EditCharPos1       = "?";
$EditCharFormatted1 = "?";

EditNumber($PassedSubFieldValue, $PassedCharFormatted, $PassedCharPos, "1", "12", $PassedErrorCode);

if ($PassedErrorCode == "illegal char") {
    $EditCharFormatted1 = $PassedCharFormatted;
    $EditCharPos1 = $PassedCharPos;
    WriteErrorMessage("C026"); 
}

if ($PassedErrorCode == "too many decimals") {
    WriteErrorMessage("C027"); 
}

if ($PassedErrorCode == "too low") {
    $EditLowValue = 1;
    WriteErrorMessage("C028"); 
}

if ($PassedErrorCode == "too high") {
    $EditHighValue = 12;
    WriteErrorMessage("C029"); 
}

}  //  End of          EditSubParmNumber($PassedFieldName, $PassedFieldValue, $PassedSubFieldValue, $PassedSubFieldPos)




//*************************************************************
//  FUNCTION: ProcessFormFieldNameLabelPlusList()
//*************************************************************

function ProcessFormFieldNameLabelPlusList() {

//-------------------------------------------------------------
//  Process the FormFieldNameLabelPlusList.
//-------------------------------------------------------------

global
    $at,
    $Browser,

    $CopyUser,

    $CRLF,

    $EditCharFormatted1,
    $EditCharPos1,
    $EditCharValue1,
    $EditEditValue1,   
    $EditEditPos1,    
    $EditFieldActualSize1,
    $EditFieldActualSize2,
    $EditFieldLabel1,
    $EditFieldLabel2,
    $EditFieldMaxSize1,
    $EditFieldMaxSize2,
    $EditFieldMinSize1,
    $EditFieldMinSize2,
    $EditFieldName1,    
    $EditFieldName2, 
    $EditFieldPos1,    
    $EditFieldPos2,    
    $EditFieldValue1,    
    $EditFieldValue2, 
    $EditLowValue,
    $EditHighValue,
    $EditParmName1,    
    $EditParmName2,
    $EditParmValue1,    
    $EditParmValue2,
    $EditParmValue3,
    $EditSubParmLabel1,
    $EditSubParm1LegalValues,
    $EditSubParmName1,
    $EditSubParmNum1,
    $EditSubParmNum2,
    $EditSubParmPos1,  
    $EditSubParmPos2,
    $EditSubParmPos3,
    $EditSubParmPos4,
    $EditSubParmValue1,    
    $EditSubParmValue2,
    $EditSubParmValue3,
    $EditSubParmValue4,
    $EditTestValue,

    $ErrorMessagEC,
    $ErrorMessageSpam,
    $ErrorNumber,
    $ErrorPrefix,
    $ErrorSequenceNumber,
    $ErrorSuffix,
    $ErrorsWritten,

    $FormCSVFileName,
    $FormEchoUser,
    $FormEmail,
    $FormEmailConfirmation,
    $FormEmailConfirmationField,
    $FormEmailConfirmationFieldLabel,
    $FormEmailField,
    $FormEmailFieldLabel,
    $FormEmailFieldList,

    $FormErrorPageCSSClassCount,
    $FormErrorPageErrorMsgClass,
    $FormErrorPageErrorMsgColor,
    $FormErrorPageErrorMsgFace,
    $FormErrorPageErrorMsgSize,
    $FormErrorPageFooterClass,
    $FormErrorPageFooterColor,
    $FormErrorPageFooterFace,
    $FormErrorPageFooterSize,
    $FormErrorPageHeading1,
    $FormErrorPageHeading1Bold,
    $FormErrorPageHeading1Class,
    $FormErrorPageHeading1Color,
    $FormErrorPageHeading1Face,
    $FormErrorPageHeading1Size,
    $FormErrorPageHeading2,
    $FormErrorPageHeading2Bold,
    $FormErrorPageHeading2Class,
    $FormErrorPageHeading2Color,
    $FormErrorPageHeading2Face,
    $FormErrorPageHeading2Size,
    $FormErrorPageLastCSSClassField,
    $FormErrorPageLastFormatField,
    $FormErrorPageLinEClosing,
    $FormErrorPageLinEClosingBold,
    $FormErrorPageLinEClosingClass,
    $FormErrorPageLinEClosingColor,
    $FormErrorPageLinEClosingFace,
    $FormErrorPageLinEClosingSize,
    $FormErrorPageLineOpening,
    $FormErrorPageLineOpeningBold,
    $FormErrorPageLineOpeningClass,
    $FormErrorPageLineOpeningColor,
    $FormErrorPageLineOpeningFace,    
    $FormErrorPageLineOpeningSize,
    $FormErrorPageTemplate,  
    $FormErrorPageTemplateContents,  
    $FormErrorPageTitle,
    $FormErrorPageTrackingInfo,

    $FormFieldNameEditList,
    $FormFieldNameEditListArray,
    $FormFieldNameExcludEArray,
    $FormFieldNameLabelArray,
    $FormFieldNameLabelListArray,
    $FormFieldNameLabelPlusList,
    $FormFieldNameLabelPlusListArray,
    $FormFieldNameMinSizEArray,
    $FormFieldNameMaxSizEArray,
    $FormFieldNameRequiredArray,
    $FormName,
    $FormNamEField,
    $FormNameFieldList,
    $FormNextURL,
    $FormOutputFieldInfo,
    $FormPleaseForgiveMyUseOfAWindowsServer,
    $FormTestEmailDomain,
    $FormTestEmailFormat,
    $FormTestFieldMinLengths,
    $FormTestFieldMaxLengths,
    $FormTestInjectionExploits,

    $HoldMsg1AddrList,
    $HoldMsg1Subject,

    $HoldMsg2AddrList,
    $HoldMsg2Subject,

    $IP,
    $Message, 

    $Msg0AddrList,
    $Msg0DefaultFromAddr,
    $Msg0FieldLabelValueSeparator, 
    $Msg0FieldNameExcludEArray,
    $Msg0FieldNameExcludeListArray,
    $Msg0FieldNameLabelList,
    $Msg0FieldNameLabelListArray,
    $Msg0FieldNameLabelListArrayDefault,
    $Msg0FieldNameValueSubstitutionArray,
    $Msg0FieldNameValueSubstitutionList,
    $Msg0FieldValueTerminator,
    $Msg0ForcEDefaultFromAddr,
    $Msg0Subject,
    $Msg0TextBottom,
    $Msg0TextTop,

    $Msg1LabelSubjectAndAddressesDropDown,
    $Msg1AddrList,
    $Msg1AddrListAndSubjectSetByDropDown,
    $Msg1DefaultFromAddr,
    $Msg1FieldLabelValueSeparator,
    $Msg1FieldNameExcludeList,
    $Msg1FieldNameExcludeListArray,
    $Msg1FieldNameLabelList,
    $Msg1FieldNameLabelListArray,
    $Msg1FieldNameValueSubstitutionArray,
    $Msg1FieldNameValueSubstitutionList,
    $Msg1FieldNameValueSubstitutionList2,
    $Msg1ForcEDefaultFromAddr,
    $Msg1Subject,
    $Msg1SubjectField,
    $Msg1TextBottom,
    $Msg1TextTop,

    $Msg2LabelSubjectAndAddressesDropDown,
    $Msg2AddrList,
    $Msg2AddrListAndSubjectSetByDropDown,
    $Msg2DefaultFromAddr,
    $Msg2FieldLabelValueSeparator,
    $Msg2FieldNameExcludeList,
    $Msg2FieldNameExcludeListArray,
    $Msg2FieldNameLabelList,
    $Msg2FieldNameLabelListArray,
    $Msg2FieldNameValueSubstitutionArray,
    $Msg2FieldNameValueSubstitutionList,
    $Msg2FieldNameValueSubstitutionList2,
    $Msg2ForcEDefaultFromAddr,
    $Msg2Subject,
    $Msg2SubjectField,
    $Msg2TextBottom,
    $Msg2TextTop,

    $MsgEchoAddressee,
    $MsgEchoFromAddr,
    $MsgEchoFieldLabelValueSeparator,
    $MsgEchoFieldNameExcludeList,
    $MsgEchoFieldNameExcludeListArray,
    $MsgEchoFieldNameLabelList,
    $MsgEchoFieldNameLabelListArray,
    $MsgEchoFieldNameValueSubstitutionArray,
    $MsgEchoFieldNameValueSubstitutionList,
    $MsgEchoFieldNameValueSubstitutionLists,
    $MsgEchoSubject,
    $MsgEchoTextBottom,
    $MsgEchoTextTop,

    $MsgNumber,

    $NextURL,
    $PHPVersion,
    $Referer,
    $ProcessFormFieldNameLabelPlusListDone,
    $ScriptPathShort,
    $ScriptPathLong,
    $ScriptStartTime,    
    $ScriptVersion,
    $TemplateErrorPlacementString,
    $ValidFieldEditsArray;

//-------------------------------------------------------------
//  Load and Process $FormFieldNameLabelPlusList giving
//  $FormFieldNameExcludEArray,
//  $FormFieldNameLabelArray,
//  $FormFieldNameMinSizEArray, 
//  $FormFieldNameMaxSizEArray,
//  $FormFieldNameRequiredArray,
//-------------------------------------------------------------

if ($ProcessFormFieldNameLabelPlusListDone) {
    return;
}

if ($ProcessFormFieldNameLabelPlusList == "*") {
    $EditParmName1 == "ProcessFormFieldNameLabelPlusList"; 
    WriteErrorMessage ("C022");
}

$FormFieldNameExcludEArray   = array();
$FormFieldNameLabelArray     = array();
$FormFieldNameMinSizEArray   = array();
$FormFieldNameMaxSizEArray   = array();
$FormFieldNameRequiredArray  = array();

if (JSHEmpty($FormFieldNameLabelPlusList) or
        strtolower(trim($FormFieldNameLabelPlusList)) == "all") {

    //  Populate $FormFieldNameLabelArray
    //  set the "label" to the same as the form name 
    
    foreach ($_POST as $VarName => $VarValue) {

        $VarName    = trim($VarName);
        $VarNameL   = strtolower($VarName);

        $VarValue4  =  substr($VarNameL, 0, 4);
        $VarValue7  =  substr($VarNameL, 0, 7);
        $VarValue8  =  substr($VarNameL, 0, 8);
        $VarValue9  =  substr($VarNameL, 0, 9);
        $VarValue10 =  substr($VarNameL, 0, 10);
        $VarValue11 =  substr($VarNameL, 0, 11);

        if (
                $VarValue8   == "copyuser"     or
                $VarValue7   == "formcsv"     or
                $VarValue8   == "formecho"     or
                $VarValue9   == "formemail"    or
                $VarValue9   == "formerror"    or
                $VarValue9   == "formfield"    or
                $VarValue8   == "formname"     or
                $VarValue11  == "formnexturl"  or
                $VarValue10  == "formoutput"   or
                $VarValue10  == "formplease"   or
                $VarValue8   == "formtest"     or
                $VarValue4   == "msg1"         or
                $VarValue4   == "msg2"         or
                $VarValue7   == "msgecho"      or
                $VarValue7   == "nexturl"
           ) {
            continue;
        } else {
            $FormFieldNameLabelArray[$VarName]    = $VarName;
        }
    }

    $FormFieldNameLabelArray["scriptstarttime"] = "Script Start Time";
    $FormFieldNameLabelArray["ip"]              = "IP Address";
    $FormFieldNameLabelArray["referer"]         = "Referer Page";
    $FormFieldNameLabelArray["phpversion"]      = "PHP Version";
    $FormFieldNameLabelArray["scriptversion"]   = "Script Version";
    $FormFieldNameLabelArray["scriptpathshort"] = "Script Path (short)";
    $FormFieldNameLabelArray["scriptpathlong"]  = "Script Path (long)";
    $FormFieldNameLabelArray["browser"]         = "Browser Information";
    
} else {

    $BlankNumber = 1;
    $LabelNumber = 1;

    $FormFieldNameLabelPlusListMod = str_replace("|", ",", $FormFieldNameLabelPlusList);
    $FormFieldNameLabelPlusListArray = explode (",", $FormFieldNameLabelPlusListMod);

//    $Count = count($FormFieldNameLabelPlusListArray);
//    $Factor = 5;
//    $Remainder = $Count % $Factor;

    $EditParmName1  = "FormFieldNameLabelPlusList";
    $EditParmValue1 = $FormFieldNameLabelPlusList;  
    
    $FormFieldNameLabelArray = $FormFieldNameMinMaxSizEArray = array();

    //  $Pos tracks the sub-parameter position for error
    //  reporting, beginning at 1

    $Pos = 0;
    $Ticker = "1";

    foreach ($FormFieldNameLabelPlusListArray as $VarNum => $VarValue) {

        $Pos = $Pos + 1;
        
        if ($Ticker == "1") {
            $LabelLine = "no";

            $EditFieldName1 = trim($VarValue);
            $EditFieldName1LC = strtolower($EditFieldName1);

            if ($EditFieldName1LC == "newline" or $EditFieldName1LC == "blankline") {
                $FormFieldNameLabelArray["blank$BlankNumber"] = "newline";
                $BlankNumber = $BlankNumber + 1;
                $Ticker = "1";

            } elseif ($EditFieldName1LC == "labelline") {
                $LabelLine = "yes";
                $Ticker = "2";

            } elseif (!array_key_exists ($EditFieldName1, $_POST) and
                    $EditFieldName1 != "scriptversion" and
                    $EditFieldName1 != "phpversion" and
                    $EditFieldName1 != "scriptstarttime" and
                    $EditFieldName1 != "scriptpathshort" and
                    $EditFieldName1 != "scriptpathlong" and
                    $EditFieldName1 != "ip" and
                    $EditFieldName1 != "browser" and
                    $EditFieldName1 != "referer" and
                    $EditFieldName1 != "referrer")
                    {
                //  set up for a possible error C002;
                //  won't know for sure until we check the
                //  required value
                $EditFieldPos1   = $VarNum;
                $ErrorNumber     = "C002";
                $Ticker = "2";
            } else {
                $ErrorNumber = "";    
                $Ticker = "2";
            }

        } elseif ($Ticker == "2") {
            $FieldLabel = trim($VarValue);
            $FieldLabel = str_replace("~", ",", $FieldLabel);

            if ($LabelLine == "yes") {
                $FormFieldNameLabelArray["label$LabelNumber"] = $FieldLabel;
                $LabelNumber = $LabelNumber + 1;
                $Ticker = "1";
            } else {
                $Ticker = "3";
            }

        } elseif ($Ticker == "3") {
            $Exclude            = "no";
            $NamECheckException = "no";
            
            $RequiredValueO = $VarValue;
            $RequiredValue = strtolower(trim($VarValue));
            $RequiredValue = str_replace("~", ",", $RequiredValue);

            //  Check for r/required, c/checkbox, y/yes, and n/no, and e/exclude
            //  "normalize" whatever is found
            if ($RequiredValue == "r" or
                    $RequiredValue == "required") {
                $RequiredValue = "yes";
            } elseif ($RequiredValue == "c" or $RequiredValue == "checkbox") {
                $RequiredValue = "checkbox";
                $NamECheckException = "yes";
            } elseif ($RequiredValue == "e" or $RequiredValue == "exclude") {
                $RequiredValue = "no";
                $Exclude = "yes";
            } else {
                NormalizeParmYN($RequiredValue, "Ignore Name", "yes", FALSE, $ErrorFound);

                if ($ErrorFound) {
//                  debug tag removed V2.2.2, 26.Apr.2009
//                  echo "error after normalize <br>";


                    $EditSubParmNum1 = $Pos - 4;
                    if ($EditSubParmNum1 < 1) {
                        $EditSubParmNum1 = 1;
                    }
                    $EditSubParmValue1  = $RequiredValueO;
                    $EditFieldPos1      = $Pos - 2;
                    $EditSubParmPos1    = $Pos;

                    $EditSubParm1LegalValues = "\"y\", \"yes\", \"n\", \"no\", \"r\", \"required\", \"c\", \"checkbox\", \"e\" and \"exclude\" (case does not matter)";
                    WriteErrorMessage("C005");
                }
            }

            //  Check to see if there is a pending error
            //  This would be a C002 from above
            //  This error does not apply for "checkboxes"
            if (!JSHEmpty($ErrorNumber)) {
                if ($NamECheckException != "yes") {
                    WriteErrorMessage($ErrorNumber);
                } else {
                    $ErrorNumber = "";
                }
            }

            $FormFieldNameLabelArray[$EditFieldName1] = $FieldLabel;

            if ($RequiredValue == "yes") {
                $FormFieldNameRequiredArray[$EditFieldName1] = "yes";
            }

            if ($Exclude == "yes") {
                $FormFieldNameExcludEArray[$EditFieldName1] = "yes";
            }

            $Ticker = "4";
            
        } elseif ($Ticker == "4") {
            $MinVal = trim($VarValue);

            //  The following test for "0" will substantially 
            //  reduce need to invoke EditInteger
            if (!JSHEmpty($MinVal) and $MinVal != "0") {

                $ErrorFound = EditInteger($MinVal, $EditCharValue1, $EditCharFormatted1, $EditCharPos1);
                
                if ($ErrorFound) {
//                  change parameter description 26.Apr.2009,  V2.2.2
//                  $EditSubParmName1   = "Minimum Value";
                    $EditSubParmName1   = "Minimum Field Length";
                    $EditSubParmValue1  = $MinVal;
                    WriteErrorMessage("C017");
                }
            } else {
                //  $MinVal is either empty or "0"
                //  Either way, set it to zero
                $MinVal = "0";
            }

            if ($MinVal != 0) {
               $FormFieldNameMinSizEArray[$EditFieldName1] = $MinVal;
            }
            $Ticker = "5";
            
        } else {
            //  Presume that $Ticker is "5"
            $MaxVal = trim($VarValue);

            //  The following test for "0" will substantially
            //  reduce need to invoke EditInteger
            if (!JSHEmpty($MaxVal) and $MaxVal != "0") {
            
                $ErrorFound = EditInteger($MaxVal, $EditCharValue1, $EditCharFormatted1, $EditCharPos1);
                
                if ($ErrorFound) {
//                change parameter description 26.Apr.2009, V2.2.2
//                $EditSubParmName1 = "Maximum Value";
                  $EditSubParmName1 = "Maximum Field Length";
                  $EditSubParmValue1 = $MaxVal;
                    WriteErrorMessage("C017");
                }
            } else {
                //  $MaxVal is either empty or "0"
                //  Either way, set it to zero
                $MaxVal = "0";
            }

            if ($MaxVal != 0) {
                $FormFieldNameMaxSizEArray[$EditFieldName1] = $MaxVal;
            }
            
            $Ticker = "1";

        }    
    }
}

//  Create $FormFieldNameLabelListArray as a "default" value
//  for $MsgxFieldNameLabelListArray

$FormFieldNameLabelListArray = array();

$Key = 0;
foreach ($FormFieldNameLabelArray as $VarName => $VarLabel) {
    $FormFieldNameLabelListArray[$Key] = $VarName;
    $Key = $Key + 1;
    $FormFieldNameLabelListArray[$Key] = $VarLabel;
    $Key = $Key + 1;
}

$ProcessFormFieldNameLabelPlusListDone = TRUE;

}  //  End of ProcessFormFieldNameLabelPlusList()




//*************************************************************
//  FUNCTION: AssembleMessage()
//*************************************************************

function AssembleMessage() {

//*************************************************************
//  AssembleMessage() uses the data in the global areas to
//  construct a value for $Message that will be the body of
//  the email. $Message will contain one line for each
//  reported field. That line will contain the field label 
//  and field value.
//*************************************************************

global 
    $at,
    $Browser,

    $CopyUser,

    $CRLF,

    $EditCharFormatted1,
    $EditCharPos1,
    $EditCharValue1,
    $EditEditValue1,   
    $EditEditPos1,    
    $EditFieldActualSize1,
    $EditFieldActualSize2,
    $EditFieldLabel1,
    $EditFieldLabel2,
    $EditFieldMaxSize1,
    $EditFieldMaxSize2,
    $EditFieldMinSize1,
    $EditFieldMinSize2,
    $EditFieldName1,    
    $EditFieldName2, 
    $EditFieldPos1,    
    $EditFieldPos2,    
    $EditFieldValue1,    
    $EditFieldValue2, 
    $EditLowValue,
    $EditHighValue,
    $EditParmName1,    
    $EditParmName2,
    $EditParmValue1,    
    $EditParmValue2,
    $EditParmValue3,
    $EditSubParmLabel1,
    $EditSubParm1LegalValues,
    $EditSubParmName1,
    $EditSubParmNum1,
    $EditSubParmNum2,
    $EditSubParmPos1,  
    $EditSubParmPos2,
    $EditSubParmPos3,
    $EditSubParmPos4,
    $EditSubParmValue1,    
    $EditSubParmValue2,
    $EditSubParmValue3,
    $EditSubParmValue4,
    $EditTestValue,

    $ErrorMessagEC,
    $ErrorMessageSpam,
    $ErrorNumber,
    $ErrorPrefix,
    $ErrorSequenceNumber,
    $ErrorSuffix,
    $ErrorsWritten,

    $FormCSVFileName,
    $FormEchoUser,
    $FormEmail,
    $FormEmailConfirmation,
    $FormEmailConfirmationField,
    $FormEmailConfirmationFieldLabel,
    $FormEmailField,
    $FormEmailFieldLabel,
    $FormEmailFieldList,

    $FormErrorPageCSSClassCount,
    $FormErrorPageErrorMsgClass,
    $FormErrorPageErrorMsgColor,
    $FormErrorPageErrorMsgFace,
    $FormErrorPageErrorMsgSize,
    $FormErrorPageFooterClass,
    $FormErrorPageFooterColor,
    $FormErrorPageFooterFace,
    $FormErrorPageFooterSize,
    $FormErrorPageHeading1,
    $FormErrorPageHeading1Bold,
    $FormErrorPageHeading1Class,
    $FormErrorPageHeading1Color,
    $FormErrorPageHeading1Face,
    $FormErrorPageHeading1Size,
    $FormErrorPageHeading2,
    $FormErrorPageHeading2Bold,
    $FormErrorPageHeading2Class,
    $FormErrorPageHeading2Color,
    $FormErrorPageHeading2Face,
    $FormErrorPageHeading2Size,
    $FormErrorPageLastCSSClassField,
    $FormErrorPageLastFormatField,
    $FormErrorPageLinEClosing,
    $FormErrorPageLinEClosingBold,
    $FormErrorPageLinEClosingClass,
    $FormErrorPageLinEClosingColor,
    $FormErrorPageLinEClosingFace,
    $FormErrorPageLinEClosingSize,
    $FormErrorPageLineOpening,
    $FormErrorPageLineOpeningBold,
    $FormErrorPageLineOpeningClass,
    $FormErrorPageLineOpeningColor,
    $FormErrorPageLineOpeningFace,    
    $FormErrorPageLineOpeningSize,
    $FormErrorPageTemplate,    
    $FormErrorPageTemplateContents,
    $FormErrorPageTitle,
    $FormErrorPageTrackingInfo,

    $FormFieldNameEditList,
    $FormFieldNameEditListArray,
    $FormFieldNameExcludEArray,
    $FormFieldNameLabelArray,
    $FormFieldNameLabelListArray,
    $FormFieldNameLabelPlusList,
    $FormFieldNameLabelPlusListArray,
    $FormFieldNameMinSizEArray,
    $FormFieldNameMaxSizEArray,
    $FormFieldNameRequiredArray,
    $FormName,
    $FormNamEField,
    $FormNameFieldList,
    $FormNextURL,
    $FormOutputFieldInfo,
    $FormPleaseForgiveMyUseOfAWindowsServer,
    $FormTestEmailDomain,
    $FormTestEmailFormat,
    $FormTestFieldMinLengths,
    $FormTestFieldMaxLengths,
    $FormTestInjectionExploits,

    $HoldMsg1AddrList,
    $HoldMsg1Subject,

    $HoldMsg2AddrList,
    $HoldMsg2Subject,

    $IP,
    $Message, 

    $Msg0AddrList,
    $Msg0DefaultFromAddr,
    $Msg0FieldLabelValueSeparator, 
    $Msg0FieldNameExcludEArray,
    $Msg0FieldNameExcludeListArray,
    $Msg0FieldNameLabelList,
    $Msg0FieldNameLabelListArray,
    $Msg0FieldNameLabelListArrayDefault,
    $Msg0FieldNameValueSubstitutionArray,
    $Msg0FieldNameValueSubstitutionList,
    $Msg0FieldValueTerminator,
    $Msg0ForcEDefaultFromAddr,
    $Msg0Subject,
    $Msg0TextBottom,
    $Msg0TextTop,

    $Msg1LabelSubjectAndAddressesDropDown,
    $Msg1AddrList,
    $Msg1AddrListAndSubjectSetByDropDown,
    $Msg1DefaultFromAddr,
    $Msg1FieldLabelValueSeparator,
    $Msg1FieldNameExcludeList,
    $Msg1FieldNameExcludeListArray,
    $Msg1FieldNameLabelList,
    $Msg1FieldNameLabelListArray,
    $Msg1FieldNameValueSubstitutionArray,
    $Msg1FieldNameValueSubstitutionList,
    $Msg1FieldNameValueSubstitutionList2,
    $Msg1ForcEDefaultFromAddr,
    $Msg1Subject,
    $Msg1SubjectField,
    $Msg1TextBottom,
    $Msg1TextTop,

    $Msg2LabelSubjectAndAddressesDropDown,
    $Msg2AddrList,
    $Msg2AddrListAndSubjectSetByDropDown,
    $Msg2DefaultFromAddr,
    $Msg2FieldLabelValueSeparator,
    $Msg2FieldNameExcludeList,
    $Msg2FieldNameExcludeListArray,
    $Msg2FieldNameLabelList,
    $Msg2FieldNameLabelListArray,
    $Msg2FieldNameValueSubstitutionArray,
    $Msg2FieldNameValueSubstitutionList,
    $Msg2FieldNameValueSubstitutionList2,
    $Msg2ForcEDefaultFromAddr,
    $Msg2Subject,
    $Msg2SubjectField,
    $Msg2TextBottom,
    $Msg2TextTop,

    $MsgEchoAddressee,
    $MsgEchoFromAddr,
    $MsgEchoFieldLabelValueSeparator,
    $MsgEchoFieldNameExcludeList,
    $MsgEchoFieldNameExcludeListArray,
    $MsgEchoFieldNameLabelList,
    $MsgEchoFieldNameLabelListArray,
    $MsgEchoFieldNameValueSubstitutionArray,
    $MsgEchoFieldNameValueSubstitutionList,
    $MsgEchoFieldNameValueSubstitutionLists,
    $MsgEchoSubject,
    $MsgEchoTextBottom,
    $MsgEchoTextTop,

    $MsgNumber,

    $NextURL,
    $PHPVersion,
    $Referer,
    $ProcessFormFieldNameLabelPlusListDone,
    $ScriptPathShort,
    $ScriptPathLong,
    $ScriptStartTime,    
    $ScriptVersion,
    $TemplateErrorPlacementString,
    $ValidFieldEditsArray;

//-------------------------------------------------------------
//  Set values for empty variables
//-------------------------------------------------------------

if ($MsgNumber != "E") {

    if (JSHEmpty($Msg0Subject)) {
        $Msg0Subject = "Message from Web Form";
    }

    if (JSHEmpty($Msg0TextTop)) {
        $Msg0TextTop = "[Begin Message]";
    }

    if (JSHEmpty($Msg0TextBottom)) {
        $Msg0TextBottom = "[End Message]";
    }

} else {

    if (JSHEmpty($Msg0Subject)) {
        $Msg0Subject = "Confirming Your Message on the Web Form";
    }

    if (JSHEmpty($Msg0TextTop)) {
        $Msg0TextTop = "You entered the following data:";
    }

    if (JSHEmpty($Msg0TextBottom)) {
        $Msg0TextBottom = "The data above was sent for you.";
    }
}

if (JSHEmpty($Msg0DefaultFromAddr)) {
    $Msg0DefaultFromAddr = $Msg0AddrList;
}

//-------------------------------------------------------------
//  Process message specific variables
//-------------------------------------------------------------

if (JSHEmpty($Msg0FieldLabelValueSeparator)) {
    $Msg0FieldLabelValueSeparator = ": ";
} elseif (strtolower($Msg0FieldLabelValueSeparator) == "crlf") {
    $Msg0FieldLabelValueSeparator = $CRLF; 
    $Msg0FieldValueTerminator = $CRLF; 
} elseif (strtolower($Msg0FieldLabelValueSeparator) == "crlf+1") {
    $Msg0FieldLabelValueSeparator = "$CRLF "; 
    $Msg0FieldValueTerminator = $CRLF; 
} elseif (strtolower($Msg0FieldLabelValueSeparator) == "crlf+2") {
    $Msg0FieldLabelValueSeparator = "$CRLF  "; 
    $Msg0FieldValueTerminator = $CRLF; 
} elseif (strtolower($Msg0FieldLabelValueSeparator) == "crlf+3") {
    $Msg0FieldLabelValueSeparator = "$CRLF   "; 
    $Msg0FieldValueTerminator = $CRLF; 
} elseif (strtolower($Msg0FieldLabelValueSeparator) == "crlf+4") {
    $Msg0FieldLabelValueSeparator = "$CRLF    "; 
    $Msg0FieldValueTerminator = $CRLF; 
} elseif (strtolower($Msg0FieldLabelValueSeparator) == "crlf+5") {
    $Msg0FieldLabelValueSeparator = "$CRLF     "; 
    $Msg0FieldValueTerminator = $CRLF; 
} elseif (strtolower($Msg0FieldLabelValueSeparator) == "crlf+6") {
    $Msg0FieldLabelValueSeparator = "$CRLF      "; 
    $Msg0FieldValueTerminator = $CRLF; 
} elseif (strtolower($Msg0FieldLabelValueSeparator) == "crlf+7") {
    $Msg0FieldLabelValueSeparator = "$CRLF       "; 
    $Msg0FieldValueTerminator = $CRLF; 
} elseif (strtolower($Msg0FieldLabelValueSeparator) == "crlf+8") {
    $Msg0FieldLabelValueSeparator = "$CRLF        "; 
    $Msg0FieldValueTerminator = $CRLF; 
} elseif (strtolower($Msg0FieldLabelValueSeparator) == "crlf+9") {
    $Msg0FieldLabelValueSeparator = "$CRLF         "; 
    $Msg0FieldValueTerminator = $CRLF; 
} elseif (strtolower($Msg0FieldLabelValueSeparator) == "crlf+10") {
    $Msg0FieldLabelValueSeparator = "$CRLF          "; 
    $Msg0FieldValueTerminator = $CRLF; 
} else {
    $Msg0FieldLabelValueSeparator = ": ";
    $Msg0FieldValueTerminator = "";
}

$Msg0FieldNameExcludEArray = array();

foreach ($Msg0FieldNameExcludeListArray as $VarNum => $VarValue) {
    $ValueName = trim($VarValue);
    $Msg0FieldNameExcludEArray[$ValueName] = " ";
}

$FormatInd = strtolower(trim($Msg0FieldNameLabelListArray[0]));

$Message = "";

if ($FormatInd == "format1" or $FormatInd == "format 1") {
    $FormatInd = "format1";
    $Key = 1;
} elseif ($FormatInd == "format2" or $FormatInd == "format 2") {
    $FormatInd = "format2";
    $Key = 1;
} elseif ($FormatInd == "format3" or $FormatInd == "format 3") {
    $FormatInd = "format3";
    $Key = 1;
} else {
    $FormatInd = "format1";
    $Key = 0;
} 

$KeyStop = count($Msg0FieldNameLabelListArray);

//  This variable has no effect on Formats 1 and 2
$FirstVariableOnNewLine = TRUE;

//  This variable has no effect on Formats 1 and 2
$Msg0FieldGroupSeparator = "    ";

$ExcludEField = FALSE;

while ($Key < $KeyStop) {

    $FieldName = trim($Msg0FieldNameLabelListArray[$Key]);

    if ($FormatInd == "format1") {
        $Key = $Key + 1;
        $FieldLabel = trim($Msg0FieldNameLabelListArray[$Key]);

        if ($FieldLabel == "*") {
            $FieldLabel = $FormFieldNameLabelArray[$FieldName];
        }
    } else {
        $FieldLabel = $FormFieldNameLabelArray[$FieldName];
    }

    if ( ($FormatInd == "format1" and ($FieldLabel == "newline" or $FieldLabel == "blank"))
        or
        ($FieldName == "newline" or $FieldName == "blank") ) {

//      do the newline thing
        $Key = $Key + 1;
        $Message = "$Message$CRLF";
        $FirstVariableOnNewLine = TRUE;    //only affects formats 2 and 3

    } elseif (substr($FieldName, 0, 5) == "label") {
        $Key = $Key + 1;
        $Message = "$Message$FieldLabel$Msg0FieldValueTerminator$CRLF";

    } elseif ($FieldName == "cond-newline") {
        $Key = $Key + 1;

        if (! $FirstVariableOnNewLine) {
//          do the newline thing
            $Message = "$Message$CRLF";
            $FirstVariableOnNewLine = TRUE;    //only affects formats 2 and 3
        }
        
    } else {
//      do the variable thing
        $Key = $Key + 1;
        $ExcludEField = FALSE;

        if (array_key_exists ($FieldName, $Msg0FieldNameExcludEArray) or
                array_key_exists ($FieldName, $FormFieldNameExcludEArray)) {
            //  found the field in the exclude array; do not process this field
            $ExcludEField = TRUE;

        //  if the field is the special field version, set the value 
        } elseif ($FieldName == "scriptversion") {
            $FieldValue = $ScriptVersion;
        
        //  if the field is the special field phpversion, set the value 
        } elseif ($FieldName == "phpversion") {
            $FieldValue = $PHPVersion;
        
        //  if the field is the special field starttime, set the value 
        } elseif ($FieldName == "scriptstarttime") {
            $FieldValue = $ScriptStartTime;
        
        //  if the field is the special field scriptshortpath, set the value 
        } elseif ($FieldName == "scriptpathshort") {
            $FieldValue = $ScriptPathShort;
        
        //  if the field is the special field scriptlongpath, set the value 
        } elseif ($FieldName == "scriptpathlong") {
            $FieldValue = $ScriptPathLong;
        
        //  if the field is the special field browser, set the value 
        } elseif ($FieldName == "browser") {
            $FieldValue = $Browser;
        
        //  if the field is the special field ip, set the value 
        } elseif ($FieldName == "ip") {

//  echo $CRLF, $CRLF;
//  echo "spot 2";

            $FieldValue = $IP;
        
        //  if the field is the special field referer, create that line 
        } elseif ($FieldName == "referer" or $FieldName == "referrer") {
            $FieldValue = $Referer;

        //  if the field is the special field,
        //  Msg1LabelSubjectAndAddressesDropDown,
        //  allow it to be reported
        //  This was changed in V2.0.4
        } elseif ($FieldName == "Msg1LabelSubjectAndAddressesDropDown") {
            $FieldValue = $Msg1LabelSubjectAndAddressesDropDown;     //V2.1.0 BETA 1

        //  if the field is the special field,
        //  Msg1LabelSubjectAndAddressesDropDown,
        //  allow it to be reported
        //  This was changed in V2.0.4
        } elseif ($FieldName == "Msg2LabelSubjectAndAddressesDropDown") {
            $FieldValue = $Msg2LabelSubjectAndAddressesDropDown;     //V2.1.0 BETA 1

        } else {
            $FieldValue = trim(stripslashes(strip_tags($_POST[$FieldName])));
           
            if (JSHEmpty($FieldValue)) {
                $FieldValue2 = "OFF";  //changed from off to OFF            V 2.1.2 
            } else {
                $FieldValue2 = $FieldValue;
            }

            $FieldNamePlusValue = "$FieldName+$FieldValue2";

            //  Check the Substitution List for the message
            $SubstitutionValue = $Msg0FieldNameValueSubstitutionArray[$FieldNamePlusValue];


            if (!JSHEmpty($SubstitutionValue)) {
                $FieldValue = $SubstitutionValue;
            }

            if (strtolower($SubstitutionValue) == "omit") {
                $ExcludEField = TRUE;
            } 
        }

        if (! $ExcludEField) {

            if (substr($FieldLabel, 0, 1) == "`") {
                $FieldLabel = substr($FieldLabel, 1);
            }

            if ($FormatInd == "format1" or $FormatInd == "format2") {
                $Message = "$Message$FieldLabel$Msg0FieldLabelValueSeparator$FieldValue$Msg0FieldValueTerminator$CRLF";

            } elseif ($FormatInd == "format3") {
                if ($FirstVariableOnNewLine) {
                    $FirstVariableOnNewLine = FALSE;
                    $Message = "$Message$FieldLabel$Msg0FieldLabelValueSeparator$FieldValue";

                } else {
                    $Message = "$Message$Msg0FieldGroupSeparator$FieldLabel$Msg0FieldLabelValueSeparator$FieldValue";

                }
            } else {
                continue;
            }
        }
    }
}

}  //  End of AssembleMessage()




//*************************************************************
//  FUNCTION: DoTheSending ()
//*************************************************************

function DoTheSending () {

//-------------------------------------------------------------
//  Send the emails
//-------------------------------------------------------------

global
    $at,
    $Browser,

    $CopyUser,

    $CRLF,

    $EditCharFormatted1,
    $EditCharPos1,
    $EditCharValue1,
    $EditEditValue1,   
    $EditEditPos1,    
    $EditFieldActualSize1,
    $EditFieldActualSize2,
    $EditFieldLabel1,
    $EditFieldLabel2,
    $EditFieldMaxSize1,
    $EditFieldMaxSize2,
    $EditFieldMinSize1,
    $EditFieldMinSize2,
    $EditFieldName1,    
    $EditFieldName2, 
    $EditFieldPos1,    
    $EditFieldPos2,    
    $EditFieldValue1,    
    $EditFieldValue2, 
    $EditLowValue,
    $EditHighValue,
    $EditParmName1,    
    $EditParmName2,
    $EditParmValue1,    
    $EditParmValue2,
    $EditParmValue3,
    $EditSubParmLabel1,
    $EditSubParm1LegalValues,
    $EditSubParmName1,
    $EditSubParmNum1,
    $EditSubParmNum2,
    $EditSubParmPos1,  
    $EditSubParmPos2,
    $EditSubParmPos3,
    $EditSubParmPos4,
    $EditSubParmValue1,    
    $EditSubParmValue2,
    $EditSubParmValue3,
    $EditSubParmValue4,
    $EditTestValue,

    $ErrorMessagEC,
    $ErrorMessageSpam,
    $ErrorNumber,
    $ErrorPrefix,
    $ErrorSequenceNumber,
    $ErrorSuffix,
    $ErrorsWritten,

    $FormCSVFileName,
    $FormEchoUser,
    $FormEmail,
    $FormEmailConfirmation,
    $FormEmailConfirmationField,
    $FormEmailConfirmationFieldLabel,
    $FormEmailField,
    $FormEmailFieldLabel,
    $FormEmailFieldList,

    $FormErrorPageCSSClassCount,
    $FormErrorPageErrorMsgClass,
    $FormErrorPageErrorMsgColor,
    $FormErrorPageErrorMsgFace,
    $FormErrorPageErrorMsgSize,
    $FormErrorPageFooterClass,
    $FormErrorPageFooterColor,
    $FormErrorPageFooterFace,
    $FormErrorPageFooterSize,
    $FormErrorPageHeading1,
    $FormErrorPageHeading1Bold,
    $FormErrorPageHeading1Class,
    $FormErrorPageHeading1Color,
    $FormErrorPageHeading1Face,
    $FormErrorPageHeading1Size,
    $FormErrorPageHeading2,
    $FormErrorPageHeading2Bold,
    $FormErrorPageHeading2Class,
    $FormErrorPageHeading2Color,
    $FormErrorPageHeading2Face,
    $FormErrorPageHeading2Size,
    $FormErrorPageLastCSSClassField,
    $FormErrorPageLastFormatField,
    $FormErrorPageLinEClosing,
    $FormErrorPageLinEClosingBold,
    $FormErrorPageLinEClosingClass,
    $FormErrorPageLinEClosingColor,
    $FormErrorPageLinEClosingFace,
    $FormErrorPageLinEClosingSize,
    $FormErrorPageLineOpening,
    $FormErrorPageLineOpeningBold,
    $FormErrorPageLineOpeningClass,
    $FormErrorPageLineOpeningColor,
    $FormErrorPageLineOpeningFace,    
    $FormErrorPageLineOpeningSize,
    $FormErrorPageTemplate,    
    $FormErrorPageTemplateContents,
    $FormErrorPageTitle,
    $FormErrorPageTrackingInfo,

    $FormFieldNameEditList,
    $FormFieldNameEditListArray,
    $FormFieldNameExcludEArray,
    $FormFieldNameLabelArray,
    $FormFieldNameLabelListArray,
    $FormFieldNameLabelPlusList,
    $FormFieldNameLabelPlusListArray,
    $FormFieldNameMinSizEArray,
    $FormFieldNameMaxSizEArray,
    $FormFieldNameRequiredArray,
    $FormName,
    $FormNamEField,
    $FormNameFieldList,
    $FormNextURL,
    $FormOutputFieldInfo,
    $FormPleaseForgiveMyUseOfAWindowsServer,
    $FormTestEmailDomain,
    $FormTestEmailFormat,
    $FormTestFieldMinLengths,
    $FormTestFieldMaxLengths,
    $FormTestInjectionExploits,

    $HoldMsg1AddrList,
    $HoldMsg1Subject,

    $HoldMsg2AddrList,
    $HoldMsg2Subject,

    $IP,
    $Message, 

    $Msg0AddrList,
    $Msg0DefaultFromAddr,
    $Msg0FieldLabelValueSeparator, 
    $Msg0FieldNameExcludEArray,
    $Msg0FieldNameExcludeListArray,
    $Msg0FieldNameLabelList,
    $Msg0FieldNameLabelListArray,
    $Msg0FieldNameLabelListArrayDefault,
    $Msg0FieldNameValueSubstitutionArray,
    $Msg0FieldNameValueSubstitutionList,
    $Msg0FieldValueTerminator,
    $Msg0ForcEDefaultFromAddr,
    $Msg0Subject,
    $Msg0TextBottom,
    $Msg0TextTop,

    $Msg1LabelSubjectAndAddressesDropDown,
    $Msg1AddrList,
    $Msg1AddrListAndSubjectSetByDropDown,
    $Msg1DefaultFromAddr,
    $Msg1FieldLabelValueSeparator,
    $Msg1FieldNameExcludeList,
    $Msg1FieldNameExcludeListArray,
    $Msg1FieldNameLabelList,
    $Msg1FieldNameLabelListArray,
    $Msg1FieldNameValueSubstitutionArray,
    $Msg1FieldNameValueSubstitutionList,
    $Msg1FieldNameValueSubstitutionList2,
    $Msg1ForcEDefaultFromAddr,
    $Msg1Subject,
    $Msg1SubjectField,
    $Msg1TextBottom,
    $Msg1TextTop,

    $Msg2LabelSubjectAndAddressesDropDown,
    $Msg2AddrList,
    $Msg2AddrListAndSubjectSetByDropDown,
    $Msg2DefaultFromAddr,
    $Msg2FieldLabelValueSeparator,
    $Msg2FieldNameExcludeList,
    $Msg2FieldNameExcludeListArray,
    $Msg2FieldNameLabelList,
    $Msg2FieldNameLabelListArray,
    $Msg2FieldNameValueSubstitutionArray,
    $Msg2FieldNameValueSubstitutionList,
    $Msg2FieldNameValueSubstitutionList2,
    $Msg2ForcEDefaultFromAddr,
    $Msg2Subject,
    $Msg2SubjectField,
    $Msg2TextBottom,
    $Msg2TextTop,

    $MsgEchoAddressee,
    $MsgEchoFromAddr,
    $MsgEchoFieldLabelValueSeparator,
    $MsgEchoFieldNameExcludeList,
    $MsgEchoFieldNameExcludeListArray,
    $MsgEchoFieldNameLabelList,
    $MsgEchoFieldNameLabelListArray,
    $MsgEchoFieldNameValueSubstitutionArray,
    $MsgEchoFieldNameValueSubstitutionList,
    $MsgEchoFieldNameValueSubstitutionLists,
    $MsgEchoSubject,
    $MsgEchoTextBottom,
    $MsgEchoTextTop,

    $MsgNumber,

    $NextURL,
    $PHPVersion,
    $Referer,
    $ProcessFormFieldNameLabelPlusListDone,
    $ScriptPathShort,
    $ScriptPathLong,
    $ScriptStartTime,    
    $ScriptVersion,
    $TemplateErrorPlacementString,
    $ValidFieldEditsArray;



if ($MsgNumber != "E") {

    $MsgAddrListMod = str_replace("|", ",", $Msg0AddrList);
    $MsgAddrListArray = explode (",", $MsgAddrListMod);
    $Msg0DefaultFromAddrMod = str_replace("|", ",", $Msg0DefaultFromAddr);
    $Msg0DefaultFromAddrArray = explode (",", $Msg0DefaultFromAddrMod);

    if (JSHEmpty($FormEmail) or strtolower($Msg0ForcEDefaultFromAddr) == "yes") {
        $Addr0 = trim($Msg0DefaultFromAddrArray[0]);
        $Addr1 = trim($Msg0DefaultFromAddrArray[1]);
        $Addr2 = trim($Msg0DefaultFromAddrArray[2]);
        
        if ($FormPleaseForgiveMyUseOfAWindowsServer == "yes") {
            $Sender = "$Addr1@$Addr2";
        } else {
            $Sender = "\"$Addr0\" <$Addr1@$Addr2>";
        }    
    
    } else {
        if (JSHEmpty($FormName)) {
            $Sender = $FormEmail;
        } else {
            if ($FormPleaseForgiveMyUseOfAWindowsServer == "yes") {
                $Sender = "$FormEmail";
            } else {  
                $Sender = "\"$FormName\" <$FormEmail>"; 
            }    
        }
    } 
}

if ($MsgNumber != "E") {

    $Ticker = "1";
    foreach ($MsgAddrListArray as $VarNum => $VarValue) {
        if ($Ticker == "1") {
            $AddrName = trim($VarValue);
            $AddrName = str_replace("*", "", $AddrName);
            $AddrName = str_replace("~", "", $AddrName);
            $AddrName = str_replace(",", "", $AddrName);
            $Ticker = "2";

        } elseif ($Ticker == "2") {
            $AddrLocal = trim($VarValue);
            $Ticker = "3";

        } else {
            $AddrDomain = trim($VarValue);

            //  format the addressee for the email and strip any embedded commas 
            if ($FormPleaseForgiveMyUseOfAWindowsServer == "yes") {
                $Addressee = "$AddrLocal$at$AddrDomain";
            } else {
                $Addressee = "\"$AddrName\" <$AddrLocal$at$AddrDomain>";
            }
                
            //  send an email with the message
            mail($Addressee,$Msg0Subject,"$CRLF$Msg0TextTop$CRLF$CRLF$Message$CRLF$Msg0TextBottom","From: $Sender");

            $Ticker = "1";
        }    
    }    
} else {

    $MsgEchoFromAddrMod = str_replace("|", ",", $MsgEchoFromAddr);
    $MsgEchoFromAddrArray = explode (",", $MsgEchoFromAddrMod);

    $Addr0 = trim($MsgEchoFromAddrArray[0]);
    $Addr1 = trim($MsgEchoFromAddrArray[1]);
    $Addr2 = trim($MsgEchoFromAddrArray[2]);

    if ($FormPleaseForgiveMyUseOfAWindowsServer == "yes") {
        $Sender = "$Addr1@$Addr2";
    } else {    
        $Sender = "\"$Addr0\" <$Addr1@$Addr2>";
    }    
       
    mail($MsgEchoAddressee,$Msg0Subject,"$CRLF$Msg0TextTop$CRLF$CRLF$Message$CRLF$Msg0TextBottom","From: $Sender");
}

}  //  End of DoTheSending ()




//*************************************************************
//  FUNCTION: EditEmailAddress1($EmailAddress, &$ReturnValue1)
//*************************************************************

function EditEmailAddress1($EmailAddress, &$ReturnValue1) {

//-------------------------------------------------------------
//  This function was adapted from 
//  Dave Child
//  www.ilovejackdaniels.com/php/email-address-validation
//-------------------------------------------------------------

$ReturnValue1 = "WALLABY"; 

//  Do not perform any checks if $EmailAddress is empty

if (JSHEmpty($EmailAddress)) {
    return 5;
}

//  Check that there's one @ symbol, and that the lengths are right

if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $EmailAddress)) {
  //  Email is invalid because one section has the wrong number of characters 
  //  or there are the wrong number of @ symbols.
  return 1;
}

//  Split the $EmailAddress into sections

//  $EmailAddress_array = explode("@", $EmailAddress);
//  list($EmailName, $EmailDomain) = split("@", $EmailAddress); 

list($EmailName, $EmailDomain) = explode("@", $EmailAddress); 

$EmailNamEArray = explode(".", $EmailName);
for ($i = 0; $i < sizeof($EmailNamEArray); $i++) {
    if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $EmailNamEArray[$i])) {
    
        $ReturnValue1 = $EmailName; 

        return 2;
    }
}  

//  Check if domain is IP. If not, it should be a valid domain name

if (!ereg("^\[?[0-9\.]+\]?$", $EmailDomain)) { 
    $EmailDomainArray = explode(".", $EmailDomain);
    if (sizeof($EmailDomainArray) < 2) {
        //  Not enough parts in the domain name
        $ReturnValue1 = $EmailDomain; 
        return 3;
    }

    for ($i = 0; $i < sizeof($EmailDomainArray); $i++) {
        if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $EmailDomainArray[$i])) {
            //  Invalid characters (or other invalid construction) in the domain name
            $ReturnValue1 = $EmailDomain; 
            return 4;
        }
    }
}

//  email address parses ok

return 0;

}  //  End of EditEmailAddress1($EmailAddress, &$ReturnValue1)




//*************************************************************
//  FUNCTION: EditEmailAddress($EmailAddressToCheck, $EmailAddressToCheckLabel, $SubParmPos, $EORC)
//*************************************************************

function EditEmailAddress($EmailAddressToCheck, $EmailAddressToCheckLabel, $SubParmPos, $EORC) {

global 
    $at,
    $Browser,

    $CopyUser,

    $CRLF,

    $EditCharFormatted1,
    $EditCharPos1,
    $EditCharValue1,
    $EditEditValue1,   
    $EditEditPos1,    
    $EditFieldActualSize1,
    $EditFieldActualSize2,
    $EditFieldLabel1,
    $EditFieldLabel2,
    $EditFieldMaxSize1,
    $EditFieldMaxSize2,
    $EditFieldMinSize1,
    $EditFieldMinSize2,
    $EditFieldName1,    
    $EditFieldName2, 
    $EditFieldPos1,    
    $EditFieldPos2,    
    $EditFieldValue1,    
    $EditFieldValue2, 
    $EditLowValue,
    $EditHighValue,
    $EditParmName1,    
    $EditParmName2,
    $EditParmValue1,    
    $EditParmValue2,
    $EditParmValue3,
    $EditSubParmLabel1,
    $EditSubParm1LegalValues,
    $EditSubParmName1,
    $EditSubParmNum1,
    $EditSubParmNum2,
    $EditSubParmPos1,  
    $EditSubParmPos2,
    $EditSubParmPos3,
    $EditSubParmPos4,
    $EditSubParmValue1,    
    $EditSubParmValue2,
    $EditSubParmValue3,
    $EditSubParmValue4,
    $EditTestValue,

    $ErrorMessagEC,
    $ErrorMessageSpam,
    $ErrorNumber,
    $ErrorPrefix,
    $ErrorSequenceNumber,
    $ErrorSuffix,
    $ErrorsWritten,

    $FormCSVFileName,
    $FormEchoUser,
    $FormEmail,
    $FormEmailConfirmation,
    $FormEmailConfirmationField,
    $FormEmailConfirmationFieldLabel,
    $FormEmailField,
    $FormEmailFieldLabel,
    $FormEmailFieldList,

    $FormErrorPageCSSClassCount,
    $FormErrorPageErrorMsgClass,
    $FormErrorPageErrorMsgColor,
    $FormErrorPageErrorMsgFace,
    $FormErrorPageErrorMsgSize,
    $FormErrorPageFooterClass,
    $FormErrorPageFooterColor,
    $FormErrorPageFooterFace,
    $FormErrorPageFooterSize,
    $FormErrorPageHeading1,
    $FormErrorPageHeading1Bold,
    $FormErrorPageHeading1Class,
    $FormErrorPageHeading1Color,
    $FormErrorPageHeading1Face,
    $FormErrorPageHeading1Size,
    $FormErrorPageHeading2,
    $FormErrorPageHeading2Bold,
    $FormErrorPageHeading2Class,
    $FormErrorPageHeading2Color,
    $FormErrorPageHeading2Face,
    $FormErrorPageHeading2Size,
    $FormErrorPageLastCSSClassField,
    $FormErrorPageLastFormatField,
    $FormErrorPageLinEClosing,
    $FormErrorPageLinEClosingBold,
    $FormErrorPageLinEClosingClass,
    $FormErrorPageLinEClosingColor,
    $FormErrorPageLinEClosingFace,
    $FormErrorPageLinEClosingSize,
    $FormErrorPageLineOpening,
    $FormErrorPageLineOpeningBold,
    $FormErrorPageLineOpeningClass,
    $FormErrorPageLineOpeningColor,
    $FormErrorPageLineOpeningFace,    
    $FormErrorPageLineOpeningSize,
    $FormErrorPageTemplate,    
    $FormErrorPageTemplateContents,
    $FormErrorPageTitle,
    $FormErrorPageTrackingInfo,

    $FormFieldNameEditList,
    $FormFieldNameEditListArray,
    $FormFieldNameExcludEArray,
    $FormFieldNameLabelArray,
    $FormFieldNameLabelListArray,
    $FormFieldNameLabelPlusList,
    $FormFieldNameLabelPlusListArray,
    $FormFieldNameMinSizEArray,
    $FormFieldNameMaxSizEArray,
    $FormFieldNameRequiredArray,
    $FormName,
    $FormNamEField,
    $FormNameFieldList,
    $FormNextURL,
    $FormOutputFieldInfo,
    $FormPleaseForgiveMyUseOfAWindowsServer,
    $FormTestEmailDomain,
    $FormTestEmailFormat,
    $FormTestFieldMinLengths,
    $FormTestFieldMaxLengths,
    $FormTestInjectionExploits,

    $HoldMsg1AddrList,
    $HoldMsg1Subject,

    $HoldMsg2AddrList,
    $HoldMsg2Subject,

    $IP,
    $Message, 

    $Msg0AddrList,
    $Msg0DefaultFromAddr,
    $Msg0FieldLabelValueSeparator, 
    $Msg0FieldNameExcludEArray,
    $Msg0FieldNameExcludeListArray,
    $Msg0FieldNameLabelList,
    $Msg0FieldNameLabelListArray,
    $Msg0FieldNameLabelListArrayDefault,
    $Msg0FieldNameValueSubstitutionArray,
    $Msg0FieldNameValueSubstitutionList,
    $Msg0FieldValueTerminator,
    $Msg0ForcEDefaultFromAddr,
    $Msg0Subject,
    $Msg0TextBottom,
    $Msg0TextTop,

    $Msg1LabelSubjectAndAddressesDropDown,
    $Msg1AddrList,
    $Msg1AddrListAndSubjectSetByDropDown,
    $Msg1DefaultFromAddr,
    $Msg1FieldLabelValueSeparator,
    $Msg1FieldNameExcludeList,
    $Msg1FieldNameExcludeListArray,
    $Msg1FieldNameLabelList,
    $Msg1FieldNameLabelListArray,
    $Msg1FieldNameValueSubstitutionArray,
    $Msg1FieldNameValueSubstitutionList,
    $Msg1FieldNameValueSubstitutionList2,
    $Msg1ForcEDefaultFromAddr,
    $Msg1Subject,
    $Msg1SubjectField,
    $Msg1TextBottom,
    $Msg1TextTop,

    $Msg2LabelSubjectAndAddressesDropDown,
    $Msg2AddrList,
    $Msg2AddrListAndSubjectSetByDropDown,
    $Msg2DefaultFromAddr,
    $Msg2FieldLabelValueSeparator,
    $Msg2FieldNameExcludeList,
    $Msg2FieldNameExcludeListArray,
    $Msg2FieldNameLabelList,
    $Msg2FieldNameLabelListArray,
    $Msg2FieldNameValueSubstitutionArray,
    $Msg2FieldNameValueSubstitutionList,
    $Msg2FieldNameValueSubstitutionList2,
    $Msg2ForcEDefaultFromAddr,
    $Msg2Subject,
    $Msg2SubjectField,
    $Msg2TextBottom,
    $Msg2TextTop,

    $MsgEchoAddressee,
    $MsgEchoFromAddr,
    $MsgEchoFieldLabelValueSeparator,
    $MsgEchoFieldNameExcludeList,
    $MsgEchoFieldNameExcludeListArray,
    $MsgEchoFieldNameLabelList,
    $MsgEchoFieldNameLabelListArray,
    $MsgEchoFieldNameValueSubstitutionArray,
    $MsgEchoFieldNameValueSubstitutionList,
    $MsgEchoFieldNameValueSubstitutionLists,
    $MsgEchoSubject,
    $MsgEchoTextBottom,
    $MsgEchoTextTop,

    $MsgNumber,

    $NextURL,
    $PHPVersion,
    $Referer,
    $ProcessFormFieldNameLabelPlusListDone,
    $ScriptPathShort,
    $ScriptPathLong,
    $ScriptStartTime,    
    $ScriptVersion,
    $TemplateErrorPlacementString,
    $ValidFieldEditsArray;

//-------------------------------------------------------------
//  Check #1
//-------------------------------------------------------------

$ReturnValue1 = " ";

$EditEmailAddress1Result = EditEmailAddress1($EmailAddressToCheck, $EditFieldValue2);

if ($EORC == "E") {    
    $EditFieldLabel1 = $EmailAddressToCheckLabel;
    $EditFieldValue1 = $EmailAddressToCheck;
} else {
    $EditParmName1     = $EmailAddressToCheckLabel;
    $EditSubParmValue1 = $EmailAddressToCheck;
    $EditSubParmValue2 = $EditFieldValue2;
    $EditSubParmPos1   = $SubParmPos; 
}

if ($EditEmailAddress1Result == 1) { 

    if ($EORC == "E") {    
        WriteErrorMessage("E005");
    } else {
        WriteErrorMessage("C007");
    }

} elseif ($EditEmailAddress1Result == 2) {

    if ($EORC == "E") {    
        WriteErrorMessage("E006");
    } else {
        WriteErrorMessage("C008");
    }

} elseif ($EditEmailAddress1Result == 3) {

    if ($EORC == "E") {    
        WriteErrorMessage("E007");
    } else {
        WriteErrorMessage("C009");
    }

} elseif ($EditEmailAddress1Result == 4) {

    if ($EORC == "E") {    
        WriteErrorMessage("E008");
    } else {
        WriteErrorMessage("C010");
    }

}

//-------------------------------------------------------------
//  Check #2
//  
//  This check based on
//  Joe Marini 
//  www.sitepoint.com/article/users-email-address-php
//  and also
//  Melvin D. Nava 
//  http://www.planet-source-code.com/vb/scripts/ShowCode.asp?txtCodEId=1316&lngWId=8
//-------------------------------------------------------------

//  If the checkdnsrr function does not exist, define one

if (!function_exists("checkdnsrr")) {

    function checkdnsrr($HostName, $RecType = '') {
        if(!JSHEmpty($HostName)) {

            if($RecType == '') $RecType = "MX";
            @exec("nslookup -type=$RecType $HostName", $Result);

            foreach($Result as $Line) {

                if(eregi("^$HostName", $Line)) {
                    return TRUE;
                }
            }
            return FALSE;
        }
        return FALSE;
    }
}

//  Version 2.1.0 BETA 3 - added check of $FormPleaseForgiveMyUseOfAWindowsServer

if ($EditEmailAddress1Result == 0 and $FormTestEmailDomain != "no"
        and $FormPleaseForgiveMyUseOfAWindowsServer != "yes") {

    list($EmailUserName, $EmailDomainName) = explode("@", $EmailAddressToCheck); 

    if (!checkdnsrr($EmailDomainName, "MX")) { 

        $EditFieldValue2   = $EmailDomainName;
        $EditSubParmValue2 = $EmailDomainName;

        if ($EORC == "E") {    
            WriteErrorMessage("E009");
        } else {
            WriteErrorMessage("C011");
        }

    } 
}

}  //  End of EditEmailAddress($EmailAddressToCheck, $EmailAddressToCheckLabel, $SubParmPos, $EORC)




//*************************************************************
//  FUNCTION: EditFormUserInput()
//*************************************************************

function EditFormUserInput() {

global 
    $at,
    $Browser,

    $CopyUser,

    $CRLF,

    $EditCharFormatted1,
    $EditCharPos1,
    $EditCharValue1,
    $EditEditValue1,   
    $EditEditPos1,    
    $EditFieldActualSize1,
    $EditFieldActualSize2,
    $EditFieldLabel1,
    $EditFieldLabel2,
    $EditFieldMaxSize1,
    $EditFieldMaxSize2,
    $EditFieldMinSize1,
    $EditFieldMinSize2,
    $EditFieldName1,    
    $EditFieldName2, 
    $EditFieldPos1,    
    $EditFieldPos2,    
    $EditFieldValue1,    
    $EditFieldValue2, 
    $EditLowValue,
    $EditHighValue,
    $EditParmName1,    
    $EditParmName2,
    $EditParmValue1,    
    $EditParmValue2,
    $EditParmValue3,
    $EditSubParmLabel1,
    $EditSubParm1LegalValues,
    $EditSubParmName1,
    $EditSubParmNum1,
    $EditSubParmNum2,
    $EditSubParmPos1,  
    $EditSubParmPos2,
    $EditSubParmPos3,
    $EditSubParmPos4,
    $EditSubParmValue1,    
    $EditSubParmValue2,
    $EditSubParmValue3,
    $EditSubParmValue4,
    $EditTestValue,

    $ErrorMessagEC,
    $ErrorMessageSpam,
    $ErrorNumber,
    $ErrorPrefix,
    $ErrorSequenceNumber,
    $ErrorSuffix,
    $ErrorsWritten,

    $FormCSVFileName,
    $FormEchoUser,
    $FormEmail,
    $FormEmailConfirmation,
    $FormEmailConfirmationField,
    $FormEmailConfirmationFieldLabel,
    $FormEmailField,
    $FormEmailFieldLabel,
    $FormEmailFieldList,

    $FormErrorPageCSSClassCount,
    $FormErrorPageErrorMsgClass,
    $FormErrorPageErrorMsgColor,
    $FormErrorPageErrorMsgFace,
    $FormErrorPageErrorMsgSize,
    $FormErrorPageFooterClass,
    $FormErrorPageFooterColor,
    $FormErrorPageFooterFace,
    $FormErrorPageFooterSize,
    $FormErrorPageHeading1,
    $FormErrorPageHeading1Bold,
    $FormErrorPageHeading1Class,
    $FormErrorPageHeading1Color,
    $FormErrorPageHeading1Face,
    $FormErrorPageHeading1Size,
    $FormErrorPageHeading2,
    $FormErrorPageHeading2Bold,
    $FormErrorPageHeading2Class,
    $FormErrorPageHeading2Color,
    $FormErrorPageHeading2Face,
    $FormErrorPageHeading2Size,
    $FormErrorPageLastCSSClassField,
    $FormErrorPageLastFormatField,
    $FormErrorPageLinEClosing,
    $FormErrorPageLinEClosingBold,
    $FormErrorPageLinEClosingClass,
    $FormErrorPageLinEClosingColor,
    $FormErrorPageLinEClosingFace,
    $FormErrorPageLinEClosingSize,
    $FormErrorPageLineOpening,
    $FormErrorPageLineOpeningBold,
    $FormErrorPageLineOpeningClass,
    $FormErrorPageLineOpeningColor,
    $FormErrorPageLineOpeningFace,    
    $FormErrorPageLineOpeningSize,
    $FormErrorPageTemplate,    
    $FormErrorPageTemplateContents,
    $FormErrorPageTitle,
    $FormErrorPageTrackingInfo,

    $FormFieldNameEditList,
    $FormFieldNameEditListArray,
    $FormFieldNameExcludEArray,
    $FormFieldNameLabelArray,
    $FormFieldNameLabelListArray,
    $FormFieldNameLabelPlusList,
    $FormFieldNameLabelPlusListArray,
    $FormFieldNameMinSizEArray,
    $FormFieldNameMaxSizEArray,
    $FormFieldNameRequiredArray,
    $FormName,
    $FormNamEField,
    $FormNameFieldList,
    $FormNextURL,
    $FormOutputFieldInfo,
    $FormPleaseForgiveMyUseOfAWindowsServer,
    $FormTestEmailDomain,
    $FormTestEmailFormat,
    $FormTestFieldMinLengths,
    $FormTestFieldMaxLengths,
    $FormTestInjectionExploits,

    $HoldMsg1AddrList,
    $HoldMsg1Subject,

    $HoldMsg2AddrList,
    $HoldMsg2Subject,

    $IP,
    $Message, 

    $Msg0AddrList,
    $Msg0DefaultFromAddr,
    $Msg0FieldLabelValueSeparator, 
    $Msg0FieldNameExcludEArray,
    $Msg0FieldNameExcludeListArray,
    $Msg0FieldNameLabelList,
    $Msg0FieldNameLabelListArray,
    $Msg0FieldNameLabelListArrayDefault,
    $Msg0FieldNameValueSubstitutionArray,
    $Msg0FieldNameValueSubstitutionList,
    $Msg0FieldValueTerminator,
    $Msg0ForcEDefaultFromAddr,
    $Msg0Subject,
    $Msg0TextBottom,
    $Msg0TextTop,

    $Msg1LabelSubjectAndAddressesDropDown,
    $Msg1AddrList,
    $Msg1AddrListAndSubjectSetByDropDown,
    $Msg1DefaultFromAddr,
    $Msg1FieldLabelValueSeparator,
    $Msg1FieldNameExcludeList,
    $Msg1FieldNameExcludeListArray,
    $Msg1FieldNameLabelList,
    $Msg1FieldNameLabelListArray,
    $Msg1FieldNameValueSubstitutionArray,
    $Msg1FieldNameValueSubstitutionList,
    $Msg1FieldNameValueSubstitutionList2,
    $Msg1ForcEDefaultFromAddr,
    $Msg1Subject,
    $Msg1SubjectField,
    $Msg1TextBottom,
    $Msg1TextTop,

    $Msg2LabelSubjectAndAddressesDropDown,
    $Msg2AddrList,
    $Msg2AddrListAndSubjectSetByDropDown,
    $Msg2DefaultFromAddr,
    $Msg2FieldLabelValueSeparator,
    $Msg2FieldNameExcludeList,
    $Msg2FieldNameExcludeListArray,
    $Msg2FieldNameLabelList,
    $Msg2FieldNameLabelListArray,
    $Msg2FieldNameValueSubstitutionArray,
    $Msg2FieldNameValueSubstitutionList,
    $Msg2FieldNameValueSubstitutionList2,
    $Msg2ForcEDefaultFromAddr,
    $Msg2Subject,
    $Msg2SubjectField,
    $Msg2TextBottom,
    $Msg2TextTop,

    $MsgEchoAddressee,
    $MsgEchoFromAddr,
    $MsgEchoFieldLabelValueSeparator,
    $MsgEchoFieldNameExcludeList,
    $MsgEchoFieldNameExcludeListArray,
    $MsgEchoFieldNameLabelList,
    $MsgEchoFieldNameLabelListArray,
    $MsgEchoFieldNameValueSubstitutionArray,
    $MsgEchoFieldNameValueSubstitutionList,
    $MsgEchoFieldNameValueSubstitutionLists,
    $MsgEchoSubject,
    $MsgEchoTextBottom,
    $MsgEchoTextTop,

    $MsgNumber,

    $NextURL,
    $PHPVersion,
    $Referer,
    $ProcessFormFieldNameLabelPlusListDone,
    $ScriptPathShort,
    $ScriptPathLong,
    $ScriptStartTime,    
    $ScriptVersion,
    $TemplateErrorPlacementString,
    $ValidFieldEditsArray;

//-------------------------------------------------------------
//  Check for Injection Exploits
//-------------------------------------------------------------

if ($TestForInjectionExploits == "yes") {
    EditFieldsForInjectionExploits ("E");
}


//-------------------------------------------------------------
//  Test the Required Fields, if any
//-------------------------------------------------------------

foreach ($FormFieldNameRequiredArray as $VarKey => $VarValue) {
    $FieldRequired  = strtolower(trim($VarValue));

    if ($FieldRequired == "yes") {
        $EditFieldName1 = trim($VarKey);
        $CheckValue = trim(stripslashes(strip_tags($_POST[$EditFieldName1])));

        if (JSHEmpty($CheckValue)) {
            $EditFieldLabel1 = trim($FormFieldNameLabelArray[$EditFieldName1]);
            WriteErrorMessage("E002");
        }
    }    
}


//-------------------------------------------------------------
//  Test the Field Lengths, if that test is specified   
//-------------------------------------------------------------

if ($FormTestFieldMaxLengths != "no") {
    foreach ($FormFieldNameMaxSizEArray as $VarKey => $VarValue) {
        $EditFieldName1     = trim($VarKey);
        $EditFieldMaxSize1  = trim($VarValue);

        $EditFieldValue1 = trim(stripslashes(strip_tags($_POST[$EditFieldName1])));
        $FieldActualSize = strlen($EditFieldValue1);

        if ($EditFieldMaxSize1 > 0 and
                $FieldActualSize > $EditFieldMaxSize1) {
            $EditFieldLabel1 = trim($FormFieldNameLabelArray[$EditFieldName1]);
            WriteErrorMessage("E003");
        } 
    }    
}        

if ($FormTestFieldMinLengths != "no") {
    foreach ($FormFieldNameMinSizEArray as $VarKey => $VarValue) {
        $EditFieldName1      = trim($VarKey);
        $EditFieldMinSize1   = trim($VarValue);

        $EditFieldValue1 = trim(stripslashes(strip_tags($_POST[$EditFieldName1])));
        $FieldActualSize = strlen($EditFieldValue1);

        if ($EditFieldMinSize1 > 0 and $FieldActualSize > 0 and $FieldActualSize < $EditFieldMinSize1) {
            $EditFieldLabel1 = trim($FormFieldNameLabelArray[$EditFieldName1]);
            WriteErrorMessage("E004");
        } 
    }    
}        
        

//-------------------------------------------------------------
//  Check $FormEmail
//-------------------------------------------------------------

if ($FormTestEmailFormat != "no") {
    $FormEmailFieldLabel = trim($FormFieldNameLabelArray[$FormEmailField]);

    if (JSHEmpty($FormEmailFieldLabel)) {
        $FormEmailFieldLabel = $FormEmailField;
    }

    EditEmailAddress($FormEmail, $FormEmailFieldLabel, 0, "E");
}


//-------------------------------------------------------------
//  Check Email Confirmation Pair
//-------------------------------------------------------------

$FormEmailConfirmationFieldLabel = trim($FormFieldNameLabelArray[$FormEmailConfirmationField]);

if (JSHEmpty($FormEmailConfirmationFieldLabel)) {
    $FormEmailConfirmationFieldLabel = $FormEmailConfirmationField;
}

//  fixed in 2.0.4 ...
//  downshifted for comparison

if (!JSHEmpty($FormEmailConfirmationField) and
        strtolower($FormEmail) !=
        strtolower($FormEmailConfirmation)) {

    $EditFieldLabel1  = $FormEmailFieldLabel;
    $EditFieldValue1  = $FormEmail;

    $EditFieldLabel2  = $FormEmailConfirmationFieldLabel;
    $EditFieldValue2  = $FormEmailConfirmation;

    WriteErrorMessage("E011");
}


//-------------------------------------------------------------
//  Check Specified Field Edits
//-------------------------------------------------------------

if (!JSHEmpty($FormFieldNameEditList)) {

    $EditParmName1  = "FormFieldNameEditList";
    $EditParmValue1 = $FormFieldNameEditList;

    $Key = 0;
    $KeyStop = count($FormFieldNameEditListArray);
    $ExpectingAFieldName = TRUE;

    if (trim($FormFieldNameEditListArray[$KeyStop-1]) != "~") {
        WriteErrorMessage("C012");
    }

    while ($Key < $KeyStop) {

        if (!$ExpectingAFieldName) {

            $EditSubParmValue4 = trim($FormFieldNameEditListArray[$Key]);

            if ($EditSubParmValue4 != "~") {
                $EditSubParmPos4 = $Key + 1;
                WriteErrorMessage("C013");
            }

            $ExpectingAFieldName = TRUE;
            $Key = $Key + 1;

        } else {

            $ExpectingAFieldName = FALSE;

            $EditFieldName1 = trim($FormFieldNameEditListArray[$Key]);

            $Key = $Key + 1;
            $EditFieldPos1 = $Key;

            $Error = "";
            if (!array_key_exists ($EditFieldName1, $_POST)) {
                $Error = "C001";
            }

            $EditFieldLabel1 = trim($FormFieldNameLabelArray[$EditFieldName1]);
            $EditFieldValue1 = trim(stripslashes(strip_tags($_POST[$EditFieldName1])));

            $EditEditValue1 = strtolower(trim($FormFieldNameEditListArray[$Key]));
            $Key = $Key + 1;
            $EditEditPos1 = $Key;

            if ($Error <> "" and $EditEditValue1 != "checkboxgroup") {
                WriteErrorMessage("$Error");
            }

            if (!in_array ($EditEditValue1, $ValidFieldEditsArray)) {
                WriteErrorMessage("C006");
            }


    //  Begin to process the specific edits


    //      Edit: CHECKBOX REQUIRED: minrequired or maxpermitted

            if ($EditEditValue1 == "checkboxgroup") {

                $MinNumberSpecified = trim($FormFieldNameEditListArray[$Key]);
                $Key = $Key + 1;
                $ErrorFound = EditInteger($MinNumberSpecified, $EditCharValue1, $EditCharFormatted1, $EditCharPos1);

                if ($ErrorFound) {
                    $EditSubParmName1   = "Minimum Number of Boxes Checked";
                    $EditSubParmValue1  = $NumberSpecified;
                    WriteErrorMessage("C017");
                }

                $MaxNumberSpecified = trim($FormFieldNameEditListArray[$Key]);
                $Key = $Key + 1;
                $ErrorFound = EditInteger($NumberSpecified, $EditCharValue1, $EditCharFormatted1, $EditCharPos1);

                if ($ErrorFound) {
                    $EditSubParmName1   = "Maximum Number of Boxes Checked";
                    $EditSubParmValue1  = $NumberSpecified;
                    WriteErrorMessage("C017");
                }

                $EditSubParmLabel1  = $EditFieldName1;
                $NumberFound        = 0;
                $FoundEnough        = FALSE;
                $ListOfSelected     = "";

                while ($Key < $KeyStop and
                        trim($FormFieldNameEditListArray[$Key]) <> "~") {

                    $EditSubParmName2 = trim($FormFieldNameEditListArray[$Key]);
                    $Key = $Key + 1;

                    if (array_key_exists ($EditSubParmName2, $_POST)) {
                        $NumberFound = $NumberFound + 1;
                        if (array_key_exists($EditSubParmName2, $FormFieldNameLabelArray) ) {
                            $EditSubParmLabel2 = $FormFieldNameLabelArray[$EditSubParmName2];
                            if (substr($EditSubParmLabel2, 0, 1) == "`") {
                                $EditSubParmLabel2 = trim(substr($EditSubParmLabel2, 1) );
                            }
                        } else {
                            $EditSubParmLabel2 = $EditSubParmName2;
                        }

                        $ListOfSelected = "$ListOfSelected, $EditSubParmLabel2";
                    }
                }

                if ($MaxNumberSpecified != 0 and $NumberFound > $MaxNumberSpecified) {
                    $EditSubParmValue1 = $NumberFound;
                    $EditSubParmValue2 = $MaxNumberSpecified;
                    $EditSubParmValue3 = substr($ListOfSelected, 2);
                    WriteErrorMessage("E027");
                }

                if ($MinNumberSpecified != 0 and $NumberFound < $MinNumberSpecified) {
                    $EditSubParmValue1 = $NumberFound;
                    $EditSubParmValue2 = $MinNumberSpecified;
                    $EditSubParmValue3 = substr($ListOfSelected, 2);
                    WriteErrorMessage("E026");
                }


    //      Edit: Drop Down

            } elseif ($EditEditValue1 == "dropdown" or $EditEditValue1 == "drop down" or $EditEditValue1 == "pulldown" or $EditEditValue1 == "pull down") {
                $EditSubParmValue1 = trim($FormFieldNameEditListArray[$Key]);
                $Key = $Key + 1;

                if (strtolower($EditFieldValue1) == strtolower($EditSubParmValue1)) {
                    WriteErrorMessage("E013");
                }


    //      Edit: Compare

            } elseif ($EditEditValue1 == "compare") {

                $EditFieldName2 = trim($FormFieldNameEditListArray[$Key]);
                $Key = $Key + 1;

                if (!array_key_exists ($EditFieldName2, $_POST)) {
                    $EditFieldName1 = $EditFieldName2;
                    $EditFieldPos1  = $Key;
                    WriteErrorMessage("C001");
                }

                $EditFieldValue2 = trim(stripslashes(strip_tags($_POST[$EditFieldName2])));

                if (strtolower($EditFieldValue1) != strtolower($EditFieldValue2))  {
                    $EditFieldLabel2 = trim($FormFieldNameLabelArray[$EditFieldName2]);
                    WriteErrorMessage("E012");
                }


    //      Edit: Email

            } elseif ($EditEditValue1 == "email") {

                $EditFieldName2 = trim($FormFieldNameEditListArray[$Key]);

                if ($EditFieldName2 != "~") {
                    $Key = $Key + 1;
                    
                    if (!array_key_exists ($EditFieldName2, $_POST)) {
                        $EditFieldName1 = $EditFieldName2;
                        $EditFieldPos1  = $Key;
                        WriteErrorMessage("C001");
                    }
                    
                    $EditFieldValue2 = trim($_POST[$EditFieldName2]);

                    if (strtolower($EditFieldValue1) != strtolower($EditFieldValue2))  {
                        $EditFieldLabel2 = trim($FormFieldNameLabelArray[$EditFieldName2]);
                        WriteErrorMessage("E011");
                    }
                }    

                if ($FormTestEmailFormat != "no") {
                    EditEmailAddress($EditFieldValue1, $EditFieldLabel1, 0, "E");
                }


    //      Edit: Captcha

            } elseif ($EditEditValue1 == "captcha") {

                $EditSubParmValue1 = strtolower(trim($FormFieldNameEditListArray[$Key]));
                $Key = $Key + 1;

                if (strtolower($EditFieldValue1) != strtolower($EditSubParmValue1))  {
                    WriteErrorMessage("E001");
                }


    //      Edit: Attraction

            } elseif ($EditEditValue1 == "attraction") {

                if (!JSHEmpty($EditFieldValue1) )  {
                    WriteErrorMessage("E014");
                }


    //      Edit: Equal

            } elseif ($EditEditValue1 == "equal" or $EditEditValue1 == "equals") {

                $CheckValue = trim($FormFieldNameEditListArray[$Key]);

                $FoundValue = FALSE;

                while ($CheckValue != "~") {

                    if (JSHEmpty($EditFieldValue1) or (strtolower($EditFieldValue1) == strtolower($CheckValue))) {

                        $FoundValue = TRUE;
                        while ($CheckValue != "~") {
                            $Key = $Key + 1;
                            $CheckValue = trim($FormFieldNameEditListArray[$Key]);
                        }

                    } else {
                        $Key = $Key + 1;
                        $CheckValue = trim($FormFieldNameEditListArray[$Key]);

                    }
                }

                if (! $FoundValue) {
                    WriteErrorMessage("E015");
                }


    //      Edit: Not Equal

            } elseif ($EditEditValue1 == "not equal" or $EditEditValue1 == "notequal") {

                $CheckValue = strtolower(trim($FormFieldNameEditListArray[$Key]));

                $FoundValue = FALSE;

                while ($CheckValue != "~") {

                    if (strtolower($EditFieldValue1) == strtolower($CheckValue)) {
                        $FoundValue = TRUE;
                        while ($CheckValue != "~") {
                            $Key = $Key + 1;
                            $CheckValue = trim($FormFieldNameEditListArray[$Key]);
                        }
                    } else {
                        $Key = $Key + 1;
                        $CheckValue = trim($FormFieldNameEditListArray[$Key]);
                    }
                }

                if ($FoundValue) {
                    WriteErrorMessage("E016");
                }


    //      Edit: Integer

            } elseif ($EditEditValue1 == "integer") {

                if (!JSHEmpty($EditFieldValue1)) {

                    $ErrorFound = EditInteger($EditFieldValue1, $EditCharValue1, $EditCharFormatted1, $EditCharPos1);

                    if ($ErrorFound) {
                        WriteErrorMessage("E017");
                    }

                    if (! $ErrorFound) {

                        $EditTestValue = intval($EditFieldValue1);
                        $EditLowValue = intval(trim($FormFieldNameEditListArray[$Key]));
                        $Key = $Key + 1;
                        $EditHighValue = intval(trim($FormFieldNameEditListArray[$Key]));
                        $Key = $Key + 1;

                        if ($EditTestValue < $EditLowValue) {
                            WriteErrorMessage("E018");
                        } elseif ($EditTestValue > $EditHighValue) {
                            WriteErrorMessage("E019");
                        }
                    } else {

                        $Key = $Key + 2;
                    }

                } else {

                    $Key = $Key + 2;

                }


    //      Edit: Number

            } elseif ($EditEditValue1 == "number") {

                if (!JSHEmpty($EditFieldValue1)) {

                    $CheckString = "0123456789.";
                    $ErrorFound = FALSE;

                    $EditFieldValueLength1 = strlen($EditFieldValue1);
                    $EditCharValue1 = substr($EditFieldValue1, 0, 1);
                    if ($EditFieldValueLength1 > 1 and ($EditCharValue1 == "+" or $EditCharValue1 == "-")) {
                        $i = 1;
                    } else {
                        $i = 0;
                    }

                    while ($i < $EditFieldValueLength1) {
                        $EditCharValue1 = substr($EditFieldValue1, $i, 1);

                        $Pos = strpos($CheckString, $EditCharValue1);

                        if ($Pos === FALSE) {

                            $EditCharPos1 = $i + 1;

                            if ($EditCharValue1 != " ") {
                                $EditCharFormatted1 = "\"$EditCharValue1\"";
                                WriteErrorMessage("E020");
                            } else {
                                $EditCharFormatted1 = "a space";
                                WriteErrorMessage("E020");
                            }

                            $ErrorFound = TRUE;
                            $i = $EditFieldValueLength1;
                        } else {
                            $i = $i + 1;
                        }
                    }

                    if (! $ErrorFound) {
                        if (substr_count($EditFieldValue1, ".") > 1) {
                            WriteErrorMessage("E021");
                            $ErrorFound = TRUE;
                            $Key=$Key+2;
                        }
                    }

                    if (! $ErrorFound) {
                        $EditTestValue = 0 + $EditFieldValue1;

                        $EditLowValue = 0 + trim($FormFieldNameEditListArray[$Key]);
                        $Key = $Key + 1;

                        $EditHighValue = 0 + trim($FormFieldNameEditListArray[$Key]);
                        $Key = $Key + 1;

                        if ($EditTestValue < $EditLowValue) {
                            WriteErrorMessage("E022");
                        } elseif ($EditTestValue > $EditHighValue) {
                            WriteErrorMessage("E023");
                        }
                    } else {
                        $Key = $Key + 2;
                    }

                } else {

                    $Key = $Key + 2;

                }


    //      Edit: Text

            } elseif ($EditEditValue1 == "text") {

                $CheckString = "";
                $EditSubParmValue1 = strtolower(trim($FormFieldNameEditListArray[$Key]));
                $Key = $Key + 1;

                while ($EditSubParmValue1 != "~") {

                    if ($EditSubParmValue1 == "letters" or $EditSubParmValue1 == "letter") {
                        $CheckString = $CheckString . "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";

                    } elseif ($EditSubParmValue1 == "numbers" or $EditSubParmValue1 == "number") {
                        $CheckString = $CheckString . "01234567890";

                    } elseif ($EditSubParmValue1 == "spaces" or $EditSubParmValue1 == "space") {
                        $CheckString = $CheckString . " ";

                    } elseif (substr($EditSubParmValue1, 0, 6) == "other:") {
                        $CheckString = $CheckString . trim(substr($EditSubParmValue1, 6));

                    } else {
                        $EditSubParmPos1 = $Key;
                        WriteErrorMessage("C014");

                    }

                    $EditSubParmValue1 = strtolower(trim($FormFieldNameEditListArray[$Key]));
                    $Key = $Key + 1;
                }

                $Key = $Key - 1;

                $i = 0;
                $EditFieldValueLength1 = strlen($EditFieldValue1);
                while ($i < $EditFieldValueLength1) {
                    $EditCharValue1 = substr($EditFieldValue1, $i, 1);

                    $Pos = strpos($CheckString, $EditCharValue1);

                    if ($Pos === FALSE) {

                        $EditCharPos1 = $i+1;

                        if ($EditCharValue1 != " ") {
                            $EditCharFormatted1 = "\"$EditCharValue1\"";
                            WriteErrorMessage("E024");
                        } else {
                            $EditCharFormatted1 = "a space";
                            WriteErrorMessage("E024");
                        }

                        $i = $EditFieldValueLength1;
                    } else {
                        $i = $i + 1;
                    }
                }


            } else {
                $Key = $Key + 1;
            }
        }
    }
}

}  //  End of EditFormUserInput()




//*************************************************************
//  FUNCTION: NormalizeParmYN(&$ParmToNormalize, $ParmToNormalizeName, $DefaultValue, $WriteError, &$ErrorFound) {
//*************************************************************

function NormalizeParmYN(&$ParmToNormalize, $ParmToNormalizeName, $DefaultValue, $WriteError, &$ErrorFound) {

global 
    $at,
    $Browser,

    $CopyUser,

    $CRLF,

    $EditCharFormatted1,
    $EditCharPos1,
    $EditCharValue1,
    $EditEditValue1,   
    $EditEditPos1,    
    $EditFieldActualSize1,
    $EditFieldActualSize2,
    $EditFieldLabel1,
    $EditFieldLabel2,
    $EditFieldMaxSize1,
    $EditFieldMaxSize2,
    $EditFieldMinSize1,
    $EditFieldMinSize2,
    $EditFieldName1,    
    $EditFieldName2, 
    $EditFieldPos1,    
    $EditFieldPos2,    
    $EditFieldValue1,    
    $EditFieldValue2, 
    $EditLowValue,
    $EditHighValue,
    $EditParmName1,    
    $EditParmName2,
    $EditParmValue1,    
    $EditParmValue2,
    $EditParmValue3,
    $EditSubParmLabel1,
    $EditSubParm1LegalValues,
    $EditSubParmName1,
    $EditSubParmNum1,
    $EditSubParmNum2,
    $EditSubParmPos1,  
    $EditSubParmPos2,
    $EditSubParmPos3,
    $EditSubParmPos4,
    $EditSubParmValue1,    
    $EditSubParmValue2,
    $EditSubParmValue3,
    $EditSubParmValue4,
    $EditTestValue,

    $ErrorMessagEC,
    $ErrorMessageSpam,
    $ErrorNumber,
    $ErrorPrefix,
    $ErrorSequenceNumber,
    $ErrorSuffix,
    $ErrorsWritten,

    $FormCSVFileName,
    $FormEchoUser,
    $FormEmail,
    $FormEmailConfirmation,
    $FormEmailConfirmationField,
    $FormEmailConfirmationFieldLabel,
    $FormEmailField,
    $FormEmailFieldLabel,
    $FormEmailFieldList,

    $FormErrorPageCSSClassCount,
    $FormErrorPageErrorMsgClass,
    $FormErrorPageErrorMsgColor,
    $FormErrorPageErrorMsgFace,
    $FormErrorPageErrorMsgSize,
    $FormErrorPageFooterClass,
    $FormErrorPageFooterColor,
    $FormErrorPageFooterFace,
    $FormErrorPageFooterSize,
    $FormErrorPageHeading1,
    $FormErrorPageHeading1Bold,
    $FormErrorPageHeading1Class,
    $FormErrorPageHeading1Color,
    $FormErrorPageHeading1Face,
    $FormErrorPageHeading1Size,
    $FormErrorPageHeading2,
    $FormErrorPageHeading2Bold,
    $FormErrorPageHeading2Class,
    $FormErrorPageHeading2Color,
    $FormErrorPageHeading2Face,
    $FormErrorPageHeading2Size,
    $FormErrorPageLastCSSClassField,
    $FormErrorPageLastFormatField,
    $FormErrorPageLinEClosing,
    $FormErrorPageLinEClosingBold,
    $FormErrorPageLinEClosingClass,
    $FormErrorPageLinEClosingColor,
    $FormErrorPageLinEClosingFace,
    $FormErrorPageLinEClosingSize,
    $FormErrorPageLineOpening,
    $FormErrorPageLineOpeningBold,
    $FormErrorPageLineOpeningClass,
    $FormErrorPageLineOpeningColor,
    $FormErrorPageLineOpeningFace,    
    $FormErrorPageLineOpeningSize,
    $FormErrorPageTemplate,    
    $FormErrorPageTemplateContents,
    $FormErrorPageTitle,
    $FormErrorPageTrackingInfo,

    $FormFieldNameEditList,
    $FormFieldNameEditListArray,
    $FormFieldNameExcludEArray,
    $FormFieldNameLabelArray,
    $FormFieldNameLabelListArray,
    $FormFieldNameLabelPlusList,
    $FormFieldNameLabelPlusListArray,
    $FormFieldNameMinSizEArray,
    $FormFieldNameMaxSizEArray,
    $FormFieldNameRequiredArray,
    $FormName,
    $FormNamEField,
    $FormNameFieldList,
    $FormNextURL,
    $FormOutputFieldInfo,
    $FormPleaseForgiveMyUseOfAWindowsServer,
    $FormTestEmailDomain,
    $FormTestEmailFormat,
    $FormTestFieldMinLengths,
    $FormTestFieldMaxLengths,
    $FormTestInjectionExploits,

    $HoldMsg1AddrList,
    $HoldMsg1Subject,

    $HoldMsg2AddrList,
    $HoldMsg2Subject,

    $IP,
    $Message, 

    $Msg0AddrList,
    $Msg0DefaultFromAddr,
    $Msg0FieldLabelValueSeparator, 
    $Msg0FieldNameExcludEArray,
    $Msg0FieldNameExcludeListArray,
    $Msg0FieldNameLabelList,
    $Msg0FieldNameLabelListArray,
    $Msg0FieldNameLabelListArrayDefault,
    $Msg0FieldNameValueSubstitutionArray,
    $Msg0FieldNameValueSubstitutionList,
    $Msg0FieldValueTerminator,
    $Msg0ForcEDefaultFromAddr,
    $Msg0Subject,
    $Msg0TextBottom,
    $Msg0TextTop,

    $Msg1LabelSubjectAndAddressesDropDown,
    $Msg1AddrList,
    $Msg1AddrListAndSubjectSetByDropDown,
    $Msg1DefaultFromAddr,
    $Msg1FieldLabelValueSeparator,
    $Msg1FieldNameExcludeList,
    $Msg1FieldNameExcludeListArray,
    $Msg1FieldNameLabelList,
    $Msg1FieldNameLabelListArray,
    $Msg1FieldNameValueSubstitutionArray,
    $Msg1FieldNameValueSubstitutionList,
    $Msg1FieldNameValueSubstitutionList2,
    $Msg1ForcEDefaultFromAddr,
    $Msg1Subject,
    $Msg1SubjectField,
    $Msg1TextBottom,
    $Msg1TextTop,

    $Msg2LabelSubjectAndAddressesDropDown,
    $Msg2AddrList,
    $Msg2AddrListAndSubjectSetByDropDown,
    $Msg2DefaultFromAddr,
    $Msg2FieldLabelValueSeparator,
    $Msg2FieldNameExcludeList,
    $Msg2FieldNameExcludeListArray,
    $Msg2FieldNameLabelList,
    $Msg2FieldNameLabelListArray,
    $Msg2FieldNameValueSubstitutionArray,
    $Msg2FieldNameValueSubstitutionList,
    $Msg2FieldNameValueSubstitutionList2,
    $Msg2ForcEDefaultFromAddr,
    $Msg2Subject,
    $Msg2SubjectField,
    $Msg2TextBottom,
    $Msg2TextTop,

    $MsgEchoAddressee,
    $MsgEchoFromAddr,
    $MsgEchoFieldLabelValueSeparator,
    $MsgEchoFieldNameExcludeList,
    $MsgEchoFieldNameExcludeListArray,
    $MsgEchoFieldNameLabelList,
    $MsgEchoFieldNameLabelListArray,
    $MsgEchoFieldNameValueSubstitutionArray,
    $MsgEchoFieldNameValueSubstitutionList,
    $MsgEchoFieldNameValueSubstitutionLists,
    $MsgEchoSubject,
    $MsgEchoTextBottom,
    $MsgEchoTextTop,

    $MsgNumber,

    $NextURL,
    $PHPVersion,
    $Referer,
    $ProcessFormFieldNameLabelPlusListDone,
    $ScriptPathShort,
    $ScriptPathLong,
    $ScriptStartTime,    
    $ScriptVersion,
    $TemplateErrorPlacementString,
    $ValidFieldEditsArray;


if ($ParmToNormalize == "*") {
    $EditParmName1 == "$ParmToNormalizeName"; 
    WriteErrorMessage ("C022");
}

$ErrorFound = FALSE;

if (JSHEmpty($ParmToNormalize)) {

    $ParmToNormalize = $DefaultValue;

} elseif ($ParmToNormalize == "y") {

    $ParmToNormalize = "yes"; 

} elseif ($ParmToNormalize == "n") {

    $ParmToNormalize = "no"; 

} elseif ($ParmToNormalize != "yes" and 
                $ParmToNormalize != "no") {

    $ErrorFound = TRUE;
    
    If ($WriteError) {
        $EditParmName1    = $ParmToNormalizeName;
        $EditParmValue1   = $ParmToNormalize;
        WriteErrorMessage("C004");
    }
    
}

}  //  End of NormalizeParmYN(&$ParmToNormalize, $ParmToNormalizeName, $DefaultValue, $WriteError, &$ErrorFound)




//*************************************************************
//  FUNCTION: NormalizeSubParmYN($PassedFieldName, $PassedSubParmNumber, &$ParmToNormalize, $DefaultValue, $WriteError, &$ErrorFound) {
//*************************************************************

function NormalizeSubParmYN($PassedFieldName, $PassedFieldValue, $PassedSubParmNumber, &$SubParmToNormalize, $DefaultValue, $WriteError, &$ErrorFound) {

global 
    $at,
    $Browser,

    $CopyUser,

    $CRLF,

    $EditCharFormatted1,
    $EditCharPos1,
    $EditCharValue1,
    $EditEditValue1,   
    $EditEditPos1,    
    $EditFieldActualSize1,
    $EditFieldActualSize2,
    $EditFieldLabel1,
    $EditFieldLabel2,
    $EditFieldMaxSize1,
    $EditFieldMaxSize2,
    $EditFieldMinSize1,
    $EditFieldMinSize2,
    $EditFieldName1,    
    $EditFieldName2, 
    $EditFieldPos1,    
    $EditFieldPos2,    
    $EditFieldValue1,    
    $EditFieldValue2, 
    $EditLowValue,
    $EditHighValue,
    $EditParmName1,    
    $EditParmName2,
    $EditParmValue1,    
    $EditParmValue2,
    $EditParmValue3,
    $EditSubParmLabel1,
    $EditSubParm1LegalValues,
    $EditSubParmName1,
    $EditSubParmNum1,
    $EditSubParmNum2,
    $EditSubParmPos1,  
    $EditSubParmPos2,
    $EditSubParmPos3,
    $EditSubParmPos4,
    $EditSubParmValue1,    
    $EditSubParmValue2,
    $EditSubParmValue3,
    $EditSubParmValue4,
    $EditTestValue,

    $ErrorMessagEC,
    $ErrorMessageSpam,
    $ErrorNumber,
    $ErrorPrefix,
    $ErrorSequenceNumber,
    $ErrorSuffix,
    $ErrorsWritten,

    $FormCSVFileName,
    $FormEchoUser,
    $FormEmail,
    $FormEmailConfirmation,
    $FormEmailConfirmationField,
    $FormEmailConfirmationFieldLabel,
    $FormEmailField,
    $FormEmailFieldLabel,
    $FormEmailFieldList,

    $FormErrorPageCSSClassCount,
    $FormErrorPageErrorMsgClass,
    $FormErrorPageErrorMsgColor,
    $FormErrorPageErrorMsgFace,
    $FormErrorPageErrorMsgSize,
    $FormErrorPageFooterClass,
    $FormErrorPageFooterColor,
    $FormErrorPageFooterFace,
    $FormErrorPageFooterSize,
    $FormErrorPageHeading1,
    $FormErrorPageHeading1Bold,
    $FormErrorPageHeading1Class,
    $FormErrorPageHeading1Color,
    $FormErrorPageHeading1Face,
    $FormErrorPageHeading1Size,
    $FormErrorPageHeading2,
    $FormErrorPageHeading2Bold,
    $FormErrorPageHeading2Class,
    $FormErrorPageHeading2Color,
    $FormErrorPageHeading2Face,
    $FormErrorPageHeading2Size,
    $FormErrorPageLastCSSClassField,
    $FormErrorPageLastFormatField,
    $FormErrorPageLinEClosing,
    $FormErrorPageLinEClosingBold,
    $FormErrorPageLinEClosingClass,
    $FormErrorPageLinEClosingColor,
    $FormErrorPageLinEClosingFace,
    $FormErrorPageLinEClosingSize,
    $FormErrorPageLineOpening,
    $FormErrorPageLineOpeningBold,
    $FormErrorPageLineOpeningClass,
    $FormErrorPageLineOpeningColor,
    $FormErrorPageLineOpeningFace,    
    $FormErrorPageLineOpeningSize,
    $FormErrorPageTemplate,    
    $FormErrorPageTemplateContents,
    $FormErrorPageTitle,
    $FormErrorPageTrackingInfo,

    $FormFieldNameEditList,
    $FormFieldNameEditListArray,
    $FormFieldNameExcludEArray,
    $FormFieldNameLabelArray,
    $FormFieldNameLabelListArray,
    $FormFieldNameLabelPlusList,
    $FormFieldNameLabelPlusListArray,
    $FormFieldNameMinSizEArray,
    $FormFieldNameMaxSizEArray,
    $FormFieldNameRequiredArray,
    $FormName,
    $FormNamEField,
    $FormNameFieldList,
    $FormNextURL,
    $FormOutputFieldInfo,
    $FormPleaseForgiveMyUseOfAWindowsServer,
    $FormTestEmailDomain,
    $FormTestEmailFormat,
    $FormTestFieldMinLengths,
    $FormTestFieldMaxLengths,
    $FormTestInjectionExploits,

    $HoldMsg1AddrList,
    $HoldMsg1Subject,

    $HoldMsg2AddrList,
    $HoldMsg2Subject,

    $IP,
    $Message, 

    $Msg0AddrList,
    $Msg0DefaultFromAddr,
    $Msg0FieldLabelValueSeparator, 
    $Msg0FieldNameExcludEArray,
    $Msg0FieldNameExcludeListArray,
    $Msg0FieldNameLabelList,
    $Msg0FieldNameLabelListArray,
    $Msg0FieldNameLabelListArrayDefault,
    $Msg0FieldNameValueSubstitutionArray,
    $Msg0FieldNameValueSubstitutionList,
    $Msg0FieldValueTerminator,
    $Msg0ForcEDefaultFromAddr,
    $Msg0Subject,
    $Msg0TextBottom,
    $Msg0TextTop,

    $Msg1LabelSubjectAndAddressesDropDown,
    $Msg1AddrList,
    $Msg1AddrListAndSubjectSetByDropDown,
    $Msg1DefaultFromAddr,
    $Msg1FieldLabelValueSeparator,
    $Msg1FieldNameExcludeList,
    $Msg1FieldNameExcludeListArray,
    $Msg1FieldNameLabelList,
    $Msg1FieldNameLabelListArray,
    $Msg1FieldNameValueSubstitutionArray,
    $Msg1FieldNameValueSubstitutionList,
    $Msg1FieldNameValueSubstitutionList2,
    $Msg1ForcEDefaultFromAddr,
    $Msg1Subject,
    $Msg1SubjectField,
    $Msg1TextBottom,
    $Msg1TextTop,

    $Msg2LabelSubjectAndAddressesDropDown,
    $Msg2AddrList,
    $Msg2AddrListAndSubjectSetByDropDown,
    $Msg2DefaultFromAddr,
    $Msg2FieldLabelValueSeparator,
    $Msg2FieldNameExcludeList,
    $Msg2FieldNameExcludeListArray,
    $Msg2FieldNameLabelList,
    $Msg2FieldNameLabelListArray,
    $Msg2FieldNameValueSubstitutionArray,
    $Msg2FieldNameValueSubstitutionList,
    $Msg2FieldNameValueSubstitutionList2,
    $Msg2ForcEDefaultFromAddr,
    $Msg2Subject,
    $Msg2SubjectField,
    $Msg2TextBottom,
    $Msg2TextTop,

    $MsgEchoAddressee,
    $MsgEchoFromAddr,
    $MsgEchoFieldLabelValueSeparator,
    $MsgEchoFieldNameExcludeList,
    $MsgEchoFieldNameExcludeListArray,
    $MsgEchoFieldNameLabelList,
    $MsgEchoFieldNameLabelListArray,
    $MsgEchoFieldNameValueSubstitutionArray,
    $MsgEchoFieldNameValueSubstitutionList,
    $MsgEchoFieldNameValueSubstitutionLists,
    $MsgEchoSubject,
    $MsgEchoTextBottom,
    $MsgEchoTextTop,

    $MsgNumber,

    $NextURL,
    $PHPVersion,
    $Referer,
    $ProcessFormFieldNameLabelPlusListDone,
    $ScriptPathShort,
    $ScriptPathLong,
    $ScriptStartTime,    
    $ScriptVersion,
    $TemplateErrorPlacementString,
    $ValidFieldEditsArray;


$ErrorFound = FALSE;

if (JSHEmpty($SubParmToNormalize)) {

    $SubParmToNormalize = $DefaultValue;

} elseif ($SubParmToNormalize == "y") {

    $SubParmToNormalize = "yes"; 

} elseif ($SubParmToNormalize == "n") {

    $SubParmToNormalize = "no"; 

} elseif ($SubParmToNormalize != "yes" and 
                $SubParmToNormalize != "no") {
    $ErrorFound = TRUE;

    If ($WriteError) { 
        $EditParmName1     = $PassedFieldName;
        $EditParmValue1    = $PassedFieldValue;
        $EditSubParmPos1   = $PassedSubParmNumber;
        $EditSubParmValue1 = $SubParmToNormalize;
        WriteErrorMessage("C033");
    }
    
}

}  //  End of NormalizeSubParmYN ($PassedFieldName, $PassedFieldValue, $PassedSubParmNumber, &$SubParmToNormalize, $DefaultValue, $WriteError, &$ErrorFound) {




//*************************************************************
//  FUNCTION: CreateInitialVariables()
//*************************************************************

function CreateInitialVariables() {

global 
    $at,
    $Browser,

    $CopyUser,

    $CRLF,

    $EditCharFormatted1,
    $EditCharPos1,
    $EditCharValue1,
    $EditEditValue1,   
    $EditEditPos1,    
    $EditFieldActualSize1,
    $EditFieldActualSize2,
    $EditFieldLabel1,
    $EditFieldLabel2,
    $EditFieldMaxSize1,
    $EditFieldMaxSize2,
    $EditFieldMinSize1,
    $EditFieldMinSize2,
    $EditFieldName1,    
    $EditFieldName2, 
    $EditFieldPos1,    
    $EditFieldPos2,    
    $EditFieldValue1,    
    $EditFieldValue2, 
    $EditLowValue,
    $EditHighValue,
    $EditParmName1,    
    $EditParmName2,
    $EditParmValue1,    
    $EditParmValue2,
    $EditParmValue3,
    $EditSubParmLabel1,
    $EditSubParm1LegalValues,
    $EditSubParmName1,
    $EditSubParmNum1,
    $EditSubParmNum2,
    $EditSubParmPos1,  
    $EditSubParmPos2,
    $EditSubParmPos3,
    $EditSubParmPos4,
    $EditSubParmValue1,    
    $EditSubParmValue2,
    $EditSubParmValue3,
    $EditSubParmValue4,
    $EditTestValue,

    $ErrorMessagEC,
    $ErrorMessageSpam,
    $ErrorNumber,
    $ErrorPrefix,
    $ErrorSequenceNumber,
    $ErrorSuffix,
    $ErrorsWritten,

    $FormCSVFileName,
    $FormEchoUser,
    $FormEmail,
    $FormEmailConfirmation,
    $FormEmailConfirmationField,
    $FormEmailConfirmationFieldLabel,
    $FormEmailField,
    $FormEmailFieldLabel,
    $FormEmailFieldList,

    $FormErrorPageCSSClassCount,
    $FormErrorPageErrorMsgClass,
    $FormErrorPageErrorMsgColor,
    $FormErrorPageErrorMsgFace,
    $FormErrorPageErrorMsgSize,
    $FormErrorPageFooterClass,
    $FormErrorPageFooterColor,
    $FormErrorPageFooterFace,
    $FormErrorPageFooterSize,
    $FormErrorPageHeading1,
    $FormErrorPageHeading1Bold,
    $FormErrorPageHeading1Class,
    $FormErrorPageHeading1Color,
    $FormErrorPageHeading1Face,
    $FormErrorPageHeading1Size,
    $FormErrorPageHeading2,
    $FormErrorPageHeading2Bold,
    $FormErrorPageHeading2Class,
    $FormErrorPageHeading2Color,
    $FormErrorPageHeading2Face,
    $FormErrorPageHeading2Size,
    $FormErrorPageLastCSSClassField,
    $FormErrorPageLastFormatField,
    $FormErrorPageLinEClosing,
    $FormErrorPageLinEClosingBold,
    $FormErrorPageLinEClosingClass,
    $FormErrorPageLinEClosingColor,
    $FormErrorPageLinEClosingFace,
    $FormErrorPageLinEClosingSize,
    $FormErrorPageLineOpening,
    $FormErrorPageLineOpeningBold,
    $FormErrorPageLineOpeningClass,
    $FormErrorPageLineOpeningColor,
    $FormErrorPageLineOpeningFace,    
    $FormErrorPageLineOpeningSize,
    $FormErrorPageTemplate,    
    $FormErrorPageTemplateContents,
    $FormErrorPageTitle,
    $FormErrorPageTrackingInfo,

    $FormFieldNameEditList,
    $FormFieldNameEditListArray,
    $FormFieldNameExcludEArray,
    $FormFieldNameLabelArray,
    $FormFieldNameLabelListArray,
    $FormFieldNameLabelPlusList,
    $FormFieldNameLabelPlusListArray,
    $FormFieldNameMinSizEArray,
    $FormFieldNameMaxSizEArray,
    $FormFieldNameRequiredArray,
    $FormName,
    $FormNamEField,
    $FormNameFieldList,
    $FormNextURL,
    $FormOutputFieldInfo,
    $FormPleaseForgiveMyUseOfAWindowsServer,
    $FormTestEmailDomain,
    $FormTestEmailFormat,
    $FormTestFieldMinLengths,
    $FormTestFieldMaxLengths,
    $FormTestInjectionExploits,

    $HoldMsg1AddrList,
    $HoldMsg1Subject,

    $HoldMsg2AddrList,
    $HoldMsg2Subject,

    $IP,
    $Message, 

    $Msg0AddrList,
    $Msg0DefaultFromAddr,
    $Msg0FieldLabelValueSeparator, 
    $Msg0FieldNameExcludEArray,
    $Msg0FieldNameExcludeListArray,
    $Msg0FieldNameLabelList,
    $Msg0FieldNameLabelListArray,
    $Msg0FieldNameLabelListArrayDefault,
    $Msg0FieldNameValueSubstitutionArray,
    $Msg0FieldNameValueSubstitutionList,
    $Msg0FieldValueTerminator,
    $Msg0ForcEDefaultFromAddr,
    $Msg0Subject,
    $Msg0TextBottom,
    $Msg0TextTop,

    $Msg1LabelSubjectAndAddressesDropDown,
    $Msg1AddrList,
    $Msg1AddrListAndSubjectSetByDropDown,
    $Msg1DefaultFromAddr,
    $Msg1FieldLabelValueSeparator,
    $Msg1FieldNameExcludeList,
    $Msg1FieldNameExcludeListArray,
    $Msg1FieldNameLabelList,
    $Msg1FieldNameLabelListArray,
    $Msg1FieldNameValueSubstitutionArray,
    $Msg1FieldNameValueSubstitutionList,
    $Msg1FieldNameValueSubstitutionList2,
    $Msg1ForcEDefaultFromAddr,
    $Msg1Subject,
    $Msg1SubjectField,
    $Msg1TextBottom,
    $Msg1TextTop,

    $Msg2LabelSubjectAndAddressesDropDown,
    $Msg2AddrList,
    $Msg2AddrListAndSubjectSetByDropDown,
    $Msg2DefaultFromAddr,
    $Msg2FieldLabelValueSeparator,
    $Msg2FieldNameExcludeList,
    $Msg2FieldNameExcludeListArray,
    $Msg2FieldNameLabelList,
    $Msg2FieldNameLabelListArray,
    $Msg2FieldNameValueSubstitutionArray,
    $Msg2FieldNameValueSubstitutionList,
    $Msg2FieldNameValueSubstitutionList2,
    $Msg2ForcEDefaultFromAddr,
    $Msg2Subject,
    $Msg2SubjectField,
    $Msg2TextBottom,
    $Msg2TextTop,

    $MsgEchoAddressee,
    $MsgEchoFromAddr,
    $MsgEchoFieldLabelValueSeparator,
    $MsgEchoFieldNameExcludeList,
    $MsgEchoFieldNameExcludeListArray,
    $MsgEchoFieldNameLabelList,
    $MsgEchoFieldNameLabelListArray,
    $MsgEchoFieldNameValueSubstitutionArray,
    $MsgEchoFieldNameValueSubstitutionList,
    $MsgEchoFieldNameValueSubstitutionLists,
    $MsgEchoSubject,
    $MsgEchoTextBottom,
    $MsgEchoTextTop,

    $MsgNumber,

    $NextURL,
    $PHPVersion,
    $Referer,
    $ProcessFormFieldNameLabelPlusListDone,
    $ScriptPathShort,
    $ScriptPathLong,
    $ScriptStartTime,    
    $ScriptVersion,
    $TemplateErrorPlacementString,
    $ValidFieldEditsArray;



//  Create "predefined" variables I will need 

$ScriptVersion = "V2.2.4  21.Jul.2012";

$at    = "@";
$CRLF  = "
";

$ErrorMessagEC = 
    "<br><br><br><br><b><i>This is a configuration error. No further processing will occur. <br><br>You did not cause this error by anything you typed into this form. <br><br>The webmaster caused this error. <br><br>If you are not the webmaster, please copy this information and immediately notify the webmaster of this error.</i></b><br><br>";
    
$ErrorMessageSpam = 
    "<i>This question is important because it helps ensure that spambots do not use this form/script to process spam.</i>"; 
    
$ErrorSequenceNumber = 0;

$TemplateErrorPlacementString = "[[INSERT HEFS ERROR MESSAGES HERE]]";

$ValidFieldEditsArray = array (
    "text",
    "integer",
    "number",
    "equal",
    "equals",
    "not equal",
    "notequal",
    "pull down",
    "pulldown",
    "drop down",
    "dropdown",
    "compare",
    "email",
    "captcha",
    "checkboxgroup",
    "attraction");

$ValidCheckboxGroupEditsArray = array ( 
    "max required",
    "min required",
    "maxpermitted",
    "minrequired");


//  Create "control" variables

$ProcessFormFieldNameLabelPlusListDone = FALSE;
$ErrorsWritten = FALSE;

//  Load some basic PHP variables 

$Browser           = $_SERVER["HTTP_USER_AGENT"];
$IP                = $_SERVER["REMOTE_ADDR"];
$PHPVersion        = phpversion();
$Referer           = $_SERVER["HTTP_REFERER"];
$ScriptPathLong    = __file__;
$ScriptPathShort   = $_SERVER["PHP_SELF"];
                                                 
//  zz
//  Added code on 15.Nov.2012 to address 
//  the timezone error reported by Matthew Phillips

date_default_timezone_set('America/Chicago');

//  End of added code 

$ScriptStartTime   = date("r", $_SERVER["REQUEST_TIME"]);

SetFormatValues ();

}  //  End of CreateInitialVariables()




//*************************************************************
//  FUNCTION: CreateFormLevelParameters()
//*************************************************************

function CreateFormLevelParameters() {

global 
    $at,
    $Browser,

    $CopyUser,

    $CRLF,

    $EditCharFormatted1,
    $EditCharPos1,
    $EditCharValue1,
    $EditEditValue1,   
    $EditEditPos1,    
    $EditFieldActualSize1,
    $EditFieldActualSize2,
    $EditFieldLabel1,
    $EditFieldLabel2,
    $EditFieldMaxSize1,
    $EditFieldMaxSize2,
    $EditFieldMinSize1,
    $EditFieldMinSize2,
    $EditFieldName1,    
    $EditFieldName2, 
    $EditFieldPos1,    
    $EditFieldPos2,    
    $EditFieldValue1,    
    $EditFieldValue2, 
    $EditLowValue,
    $EditHighValue,
    $EditParmName1,    
    $EditParmName2,
    $EditParmValue1,    
    $EditParmValue2,
    $EditParmValue3,
    $EditSubParmLabel1,
    $EditSubParm1LegalValues,
    $EditSubParmName1,
    $EditSubParmNum1,
    $EditSubParmNum2,
    $EditSubParmPos1,  
    $EditSubParmPos2,
    $EditSubParmPos3,
    $EditSubParmPos4,
    $EditSubParmValue1,    
    $EditSubParmValue2,
    $EditSubParmValue3,
    $EditSubParmValue4,
    $EditTestValue,

    $ErrorMessagEC,
    $ErrorMessageSpam,
    $ErrorNumber,
    $ErrorPrefix,
    $ErrorSequenceNumber,
    $ErrorSuffix,
    $ErrorsWritten,

    $FormCSVFileName,
    $FormEchoUser,
    $FormEmail,
    $FormEmailConfirmation,
    $FormEmailConfirmationField,
    $FormEmailConfirmationFieldLabel,
    $FormEmailField,
    $FormEmailFieldLabel,
    $FormEmailFieldList,

    $FormErrorPageCSSClassCount,
    $FormErrorPageErrorMsgClass,
    $FormErrorPageErrorMsgColor,
    $FormErrorPageErrorMsgFace,
    $FormErrorPageErrorMsgSize,
    $FormErrorPageFooterClass,
    $FormErrorPageFooterColor,
    $FormErrorPageFooterFace,
    $FormErrorPageFooterSize,
    $FormErrorPageHeading1,
    $FormErrorPageHeading1Bold,
    $FormErrorPageHeading1Class,
    $FormErrorPageHeading1Color,
    $FormErrorPageHeading1Face,
    $FormErrorPageHeading1Size,
    $FormErrorPageHeading2,
    $FormErrorPageHeading2Bold,
    $FormErrorPageHeading2Class,
    $FormErrorPageHeading2Color,
    $FormErrorPageHeading2Face,
    $FormErrorPageHeading2Size,
    $FormErrorPageLastCSSClassField,
    $FormErrorPageLastFormatField,
    $FormErrorPageLinEClosing,
    $FormErrorPageLinEClosingBold,
    $FormErrorPageLinEClosingClass,
    $FormErrorPageLinEClosingColor,
    $FormErrorPageLinEClosingFace,
    $FormErrorPageLinEClosingSize,
    $FormErrorPageLineOpening,
    $FormErrorPageLineOpeningBold,
    $FormErrorPageLineOpeningClass,
    $FormErrorPageLineOpeningColor,
    $FormErrorPageLineOpeningFace,    
    $FormErrorPageLineOpeningSize,
    $FormErrorPageTemplate,    
    $FormErrorPageTemplateContents,
    $FormErrorPageTitle,
    $FormErrorPageTrackingInfo,

    $FormFieldNameEditList,
    $FormFieldNameEditListArray,
    $FormFieldNameExcludEArray,
    $FormFieldNameLabelArray,
    $FormFieldNameLabelListArray,
    $FormFieldNameLabelPlusList,
    $FormFieldNameLabelPlusListArray,
    $FormFieldNameMinSizEArray,
    $FormFieldNameMaxSizEArray,
    $FormFieldNameRequiredArray,
    $FormName,
    $FormNamEField,
    $FormNameFieldList,
    $FormNextURL,
    $FormOutputFieldInfo,
    $FormPleaseForgiveMyUseOfAWindowsServer,
    $FormTestEmailDomain,
    $FormTestEmailFormat,
    $FormTestFieldMinLengths,
    $FormTestFieldMaxLengths,
    $FormTestInjectionExploits,

    $HoldMsg1AddrList,
    $HoldMsg1Subject,

    $HoldMsg2AddrList,
    $HoldMsg2Subject,

    $IP,
    $Message, 

    $Msg0AddrList,
    $Msg0DefaultFromAddr,
    $Msg0FieldLabelValueSeparator, 
    $Msg0FieldNameExcludEArray,
    $Msg0FieldNameExcludeListArray,
    $Msg0FieldNameLabelList,
    $Msg0FieldNameLabelListArray,
    $Msg0FieldNameLabelListArrayDefault,
    $Msg0FieldNameValueSubstitutionArray,
    $Msg0FieldNameValueSubstitutionList,
    $Msg0FieldValueTerminator,
    $Msg0ForcEDefaultFromAddr,
    $Msg0Subject,
    $Msg0TextBottom,
    $Msg0TextTop,

    $Msg1LabelSubjectAndAddressesDropDown,
    $Msg1AddrList,
    $Msg1AddrListAndSubjectSetByDropDown,
    $Msg1DefaultFromAddr,
    $Msg1FieldLabelValueSeparator,
    $Msg1FieldNameExcludeList,
    $Msg1FieldNameExcludeListArray,
    $Msg1FieldNameLabelList,
    $Msg1FieldNameLabelListArray,
    $Msg1FieldNameValueSubstitutionArray,
    $Msg1FieldNameValueSubstitutionList,
    $Msg1FieldNameValueSubstitutionList2,
    $Msg1ForcEDefaultFromAddr,
    $Msg1Subject,
    $Msg1SubjectField,
    $Msg1TextBottom,
    $Msg1TextTop,

    $Msg2LabelSubjectAndAddressesDropDown,
    $Msg2AddrList,
    $Msg2AddrListAndSubjectSetByDropDown,
    $Msg2DefaultFromAddr,
    $Msg2FieldLabelValueSeparator,
    $Msg2FieldNameExcludeList,
    $Msg2FieldNameExcludeListArray,
    $Msg2FieldNameLabelList,
    $Msg2FieldNameLabelListArray,
    $Msg2FieldNameValueSubstitutionArray,
    $Msg2FieldNameValueSubstitutionList,
    $Msg2FieldNameValueSubstitutionList2,
    $Msg2ForcEDefaultFromAddr,
    $Msg2Subject,
    $Msg2SubjectField,
    $Msg2TextBottom,
    $Msg2TextTop,

    $MsgEchoAddressee,
    $MsgEchoFromAddr,
    $MsgEchoFieldLabelValueSeparator,
    $MsgEchoFieldNameExcludeList,
    $MsgEchoFieldNameExcludeListArray,
    $MsgEchoFieldNameLabelList,
    $MsgEchoFieldNameLabelListArray,
    $MsgEchoFieldNameValueSubstitutionArray,
    $MsgEchoFieldNameValueSubstitutionList,
    $MsgEchoFieldNameValueSubstitutionLists,
    $MsgEchoSubject,
    $MsgEchoTextBottom,
    $MsgEchoTextTop,

    $MsgNumber,

    $NextURL,
    $PHPVersion,
    $Referer,
    $ProcessFormFieldNameLabelPlusListDone,
    $ScriptPathShort,
    $ScriptPathLong,
    $ScriptStartTime,    
    $ScriptVersion,
    $TemplateErrorPlacementString,
    $ValidFieldEditsArray;



//  $CopyUser is deprecated
$CopyUser                             = "";

$FormCSVFileName                      = "";
$FormEchoUser                         = "";

//  $FormEmailField is deprecated
$FormEmailField                       = "";
$FormEmailFieldList                   = "";

//  $FormFieldNamECompareList has been removed during development 
//  $FormFieldNamECompareList             = "";

$FormFieldNameEditList                = ""; 
$FormNameFieldList                    = ""; 
$FormFieldNameLabelPlusList           = ""; 

// $FormNamEField is deprecated
$FormNamEField                        = ""; 

$FormNextURL                          = ""; 

$FormOutputFieldInfo                  = ""; 
$FormPleaseForgiveMyUseOfAWindowsServer = "";

$FormTestEmailDomain                  = ""; 
$FormTestEmailFormat                  = "";

$FormTestFieldMinLengths              = ""; 
$FormTestFieldMaxLengths              = ""; 
$FormTestInjectionExploits            = ""; 

// $NextURL is deprecated
$NextURL                              = ""; 

}  //  End of CreateFormLevelParameters()




//*************************************************************
//  FUNCTION: LoadFormLevelParameters()    
//*************************************************************

function LoadFormLevelParameters() {

global 
    $at,
    $Browser,

    $CopyUser,

    $CRLF,

    $EditCharFormatted1,
    $EditCharPos1,
    $EditCharValue1,
    $EditEditValue1,   
    $EditEditPos1,    
    $EditFieldActualSize1,
    $EditFieldActualSize2,
    $EditFieldLabel1,
    $EditFieldLabel2,
    $EditFieldMaxSize1,
    $EditFieldMaxSize2,
    $EditFieldMinSize1,
    $EditFieldMinSize2,
    $EditFieldName1,    
    $EditFieldName2, 
    $EditFieldPos1,    
    $EditFieldPos2,    
    $EditFieldValue1,    
    $EditFieldValue2, 
    $EditLowValue,
    $EditHighValue,
    $EditParmName1,    
    $EditParmName2,
    $EditParmValue1,    
    $EditParmValue2,
    $EditParmValue3,
    $EditSubParmLabel1,
    $EditSubParm1LegalValues,
    $EditSubParmName1,
    $EditSubParmNum1,
    $EditSubParmNum2,
    $EditSubParmPos1,  
    $EditSubParmPos2,
    $EditSubParmPos3,
    $EditSubParmPos4,
    $EditSubParmValue1,    
    $EditSubParmValue2,
    $EditSubParmValue3,
    $EditSubParmValue4,
    $EditTestValue,

    $ErrorMessagEC,
    $ErrorMessageSpam,
    $ErrorNumber,
    $ErrorPrefix,
    $ErrorSequenceNumber,
    $ErrorSuffix,
    $ErrorsWritten,

    $FormCSVFileName,
    $FormEchoUser,
    $FormEmail,
    $FormEmailConfirmation,
    $FormEmailConfirmationField,
    $FormEmailConfirmationFieldLabel,
    $FormEmailField,
    $FormEmailFieldLabel,
    $FormEmailFieldList,

    $FormErrorPageCSSClassCount,
    $FormErrorPageErrorMsgClass,
    $FormErrorPageErrorMsgColor,
    $FormErrorPageErrorMsgFace,
    $FormErrorPageErrorMsgSize,
    $FormErrorPageFooterClass,
    $FormErrorPageFooterColor,
    $FormErrorPageFooterFace,
    $FormErrorPageFooterSize,
    $FormErrorPageHeading1,
    $FormErrorPageHeading1Bold,
    $FormErrorPageHeading1Class,
    $FormErrorPageHeading1Color,
    $FormErrorPageHeading1Face,
    $FormErrorPageHeading1Size,
    $FormErrorPageHeading2,
    $FormErrorPageHeading2Bold,
    $FormErrorPageHeading2Class,
    $FormErrorPageHeading2Color,
    $FormErrorPageHeading2Face,
    $FormErrorPageHeading2Size,
    $FormErrorPageLastCSSClassField,
    $FormErrorPageLastFormatField,
    $FormErrorPageLinEClosing,
    $FormErrorPageLinEClosingBold,
    $FormErrorPageLinEClosingClass,
    $FormErrorPageLinEClosingColor,
    $FormErrorPageLinEClosingFace,
    $FormErrorPageLinEClosingSize,
    $FormErrorPageLineOpening,
    $FormErrorPageLineOpeningBold,
    $FormErrorPageLineOpeningClass,
    $FormErrorPageLineOpeningColor,
    $FormErrorPageLineOpeningFace,    
    $FormErrorPageLineOpeningSize,
    $FormErrorPageTemplate,    
    $FormErrorPageTemplateContents,
    $FormErrorPageTitle,
    $FormErrorPageTrackingInfo,

    $FormFieldNameEditList,
    $FormFieldNameEditListArray,
    $FormFieldNameExcludEArray,
    $FormFieldNameLabelArray,
    $FormFieldNameLabelListArray,
    $FormFieldNameLabelPlusList,
    $FormFieldNameLabelPlusListArray,
    $FormFieldNameMinSizEArray,
    $FormFieldNameMaxSizEArray,
    $FormFieldNameRequiredArray,
    $FormName,
    $FormNamEField,
    $FormNameFieldList,
    $FormNextURL,
    $FormOutputFieldInfo,
    $FormPleaseForgiveMyUseOfAWindowsServer,
    $FormTestEmailDomain,
    $FormTestEmailFormat,
    $FormTestFieldMinLengths,
    $FormTestFieldMaxLengths,
    $FormTestInjectionExploits,

    $HoldMsg1AddrList,
    $HoldMsg1Subject,

    $HoldMsg2AddrList,
    $HoldMsg2Subject,

    $IP,
    $Message, 

    $Msg0AddrList,
    $Msg0DefaultFromAddr,
    $Msg0FieldLabelValueSeparator, 
    $Msg0FieldNameExcludEArray,
    $Msg0FieldNameExcludeListArray,
    $Msg0FieldNameLabelList,
    $Msg0FieldNameLabelListArray,
    $Msg0FieldNameLabelListArrayDefault,
    $Msg0FieldNameValueSubstitutionArray,
    $Msg0FieldNameValueSubstitutionList,
    $Msg0FieldValueTerminator,
    $Msg0ForcEDefaultFromAddr,
    $Msg0Subject,
    $Msg0TextBottom,
    $Msg0TextTop,

    $Msg1LabelSubjectAndAddressesDropDown,
    $Msg1AddrList,
    $Msg1AddrListAndSubjectSetByDropDown,
    $Msg1DefaultFromAddr,
    $Msg1FieldLabelValueSeparator,
    $Msg1FieldNameExcludeList,
    $Msg1FieldNameExcludeListArray,
    $Msg1FieldNameLabelList,
    $Msg1FieldNameLabelListArray,
    $Msg1FieldNameValueSubstitutionArray,
    $Msg1FieldNameValueSubstitutionList,
    $Msg1FieldNameValueSubstitutionList2,
    $Msg1ForcEDefaultFromAddr,
    $Msg1Subject,
    $Msg1SubjectField,
    $Msg1TextBottom,
    $Msg1TextTop,

    $Msg2LabelSubjectAndAddressesDropDown,
    $Msg2AddrList,
    $Msg2AddrListAndSubjectSetByDropDown,
    $Msg2DefaultFromAddr,
    $Msg2FieldLabelValueSeparator,
    $Msg2FieldNameExcludeList,
    $Msg2FieldNameExcludeListArray,
    $Msg2FieldNameLabelList,
    $Msg2FieldNameLabelListArray,
    $Msg2FieldNameValueSubstitutionArray,
    $Msg2FieldNameValueSubstitutionList,
    $Msg2FieldNameValueSubstitutionList2,
    $Msg2ForcEDefaultFromAddr,
    $Msg2Subject,
    $Msg2SubjectField,
    $Msg2TextBottom,
    $Msg2TextTop,

    $MsgEchoAddressee,
    $MsgEchoFromAddr,
    $MsgEchoFieldLabelValueSeparator,
    $MsgEchoFieldNameExcludeList,
    $MsgEchoFieldNameExcludeListArray,
    $MsgEchoFieldNameLabelList,
    $MsgEchoFieldNameLabelListArray,
    $MsgEchoFieldNameValueSubstitutionArray,
    $MsgEchoFieldNameValueSubstitutionList,
    $MsgEchoFieldNameValueSubstitutionLists,
    $MsgEchoSubject,
    $MsgEchoTextBottom,
    $MsgEchoTextTop,

    $MsgNumber,

    $NextURL,
    $PHPVersion,
    $Referer,
    $ProcessFormFieldNameLabelPlusListDone,
    $ScriptPathShort,
    $ScriptPathLong,
    $ScriptStartTime,    
    $ScriptVersion,
    $TemplateErrorPlacementString,
    $ValidFieldEditsArray;



//  $CopyUser is deprecated
if (array_key_exists ("CopyUser", $_POST)) { 
    $CopyUser = strtolower(trim(stripslashes(strip_tags($_POST["CopyUser"])))); 
}

if (array_key_exists ("FormCSVFileName", $_POST)) {
//  changed in V2.0.1 BETA 3 ... downshift removed
//    $FormCSVFileName = strtolower(trim(stripslashes(strip_tags($_POST["FormCSVFileName"]))));
    $FormCSVFileName = trim(stripslashes(strip_tags($_POST["FormCSVFileName"])));
}

if (array_key_exists ("FormEchoUser", $_POST)) {
    $FormEchoUser = strtolower(trim(stripslashes(strip_tags($_POST["FormEchoUser"])))); 
}

//  $FormEmailField is deprecated
if (array_key_exists ("FormEmailField", $_POST)) { 
    $FormEmailField = trim(stripslashes(strip_tags($_POST["FormEmailField"]))); 
}

if (array_key_exists ("FormEmailFieldList", $_POST)) { 
    $FormEmailFieldList = trim(stripslashes(strip_tags($_POST["FormEmailFieldList"]))); 
}

if (array_key_exists ("FormErrorPageHeading1", $_POST)) { 
    $Test1 = trim(stripslashes(strip_tags($_POST["FormErrorPageHeading1"])));
    if (!JSHEmpty($Test1)) {
        $FormErrorPageHeading1 = $Test1;
    }
}

if (array_key_exists ("FormErrorPageHeading2", $_POST)) {
    $Test1 = trim(stripslashes(strip_tags($_POST["FormErrorPageHeading2"])));
    if (!JSHEmpty($Test1)) {
        $FormErrorPageHeading2 = $Test1;
    }
}

if (array_key_exists ("FormErrorPageLinEClosing", $_POST)) {
    $Test1 = trim(stripslashes(strip_tags($_POST["$FormErrorPageLinEClosing"])));
    if (!JSHEmpty($Test1)) {
        $FormErrorPageLinEClosing = $Test1;
    }
}

if (array_key_exists ("FormErrorPageLineOpening", $_POST)) {
    $Test1 = trim(stripslashes(strip_tags($_POST["FormErrorPageLineOpening"])));
    if (!JSHEmpty($Test1)) {
        $FormErrorPageLineOpening = $Test1;
    }
}

if (array_key_exists ("FormErrorPageFooter", $_POST)) {
    $Test1 = trim(stripslashes(strip_tags($_POST["FormErrorPageFooter"])));
    if (!JSHEmpty($Test1)) {
        $FormErrorPageFooter = $Test1;
    }
}

if (array_key_exists ("FormErrorPageErrorMsg", $_POST)) {
    $Test1 = trim(stripslashes(strip_tags($_POST["FormErrorPageErrorMsg"])));
    if (!JSHEmpty($Test1)) {
        $FormErrorPageErrorMsg = $Test1;
    }
}

if (array_key_exists ("FormErrorPageTemplate", $_POST)) { 
    $Test1 = trim(stripslashes(strip_tags($_POST["FormErrorPageTemplate"])));
    if (!JSHEmpty($Test1)) {
        $FormErrorPageTemplate = $Test1;
    }
}

if (array_key_exists ("FormErrorPageTitle", $_POST)) { 
    $Test1 = trim(stripslashes(strip_tags($_POST["FormErrorPageTitle"])));
    if (!JSHEmpty($Test1)) {
        $FormErrorPageTitle = $Test1;
    }
}

if (array_key_exists ("FormErrorPageTrackingInfo", $_POST)) { 
    $FormErrorPageTrackingInfo = strtolower(trim(stripslashes(strip_tags($_POST["FormErrorPageTrackingInfo"])))); 
}

//  $FormFieldNamECompareList has been removed during development
//  $FormFieldNamECompareList             = trim(stripslashes(strip_tags($_POST["FormFieldNamECompareList"])));

if (array_key_exists ("FormFieldNameEditList", $_POST)) { 
    $FormFieldNameEditList = trim(stripslashes(strip_tags($_POST["FormFieldNameEditList"])));
}

if (array_key_exists ("FormNameFieldList", $_POST)) { 
    $FormNameFieldList = trim(stripslashes(strip_tags($_POST["FormNameFieldList"]))); 
}

if (array_key_exists ("FormFieldNameLabelPlusList", $_POST)) { 
    $FormFieldNameLabelPlusList = trim(stripslashes(strip_tags($_POST["FormFieldNameLabelPlusList"])));
}

// $FormNamEField is deprecated
if (array_key_exists ("FormNamEField", $_POST)) { 
    $FormNamEField = trim(stripslashes(strip_tags($_POST["FormNamEField"]))); 
}

if (array_key_exists ("FormNextURL", $_POST)) { 
    $FormNextURL = trim(stripslashes(strip_tags($_POST["FormNextURL"]))); 
}

if (array_key_exists ("FormOutputFieldInfo", $_POST)) { 
    $FormOutputFieldInfo = strtolower(trim(stripslashes(strip_tags($_POST["FormOutputFieldInfo"])))); 
}

if (array_key_exists ("FormPleaseForgiveMyUseOfAWindowsServer", $_POST)) { 
    $FormPleaseForgiveMyUseOfAWindowsServer = strtolower(trim(stripslashes(strip_tags($_POST["FormPleaseForgiveMyUseOfAWindowsServer"])))); 
}

if (array_key_exists ("FormTestEmailDomain", $_POST)) { 
    $FormTestEmailDomain = strtolower(trim(stripslashes(strip_tags($_POST["FormTestEmailDomain"])))); 
}

if (array_key_exists ("FormTestEmailFormat", $_POST)) { 
    $FormTestEmailFormat = strtolower(trim(stripslashes(strip_tags($_POST["FormTestEmailFormat"])))); 
}

if (array_key_exists ("FormTestFieldMinLengths", $_POST)) { 
    $FormTestFieldMinLengths = strtolower(trim(stripslashes(strip_tags($_POST["FormTestFieldMinLengths"])))); 
}

if (array_key_exists ("FormTestFieldMaxLengths", $_POST)) { 
    $FormTestFieldMaxLengths = strtolower(trim(stripslashes(strip_tags($_POST["FormTestFieldMaxLengths"])))); 
}

if (array_key_exists ("FormTestInjectionExploits", $_POST)) { 
    $FormTestInjectionExploits = strtolower(trim(stripslashes(strip_tags($_POST["FormTestInjectionExploits"])))); 
}

// $NextURL is deprecated
if (array_key_exists ("NextURL", $_POST)) { 
    $NextURL = trim(stripslashes(strip_tags($_POST["NextURL"]))); 
}

}  //  End of LoadFormLevelParameters()




//*************************************************************
//  FUNCTION: CreateMsgLevelParameters ()
//*************************************************************

function CreateMsgLevelParameters () {

global 
    $at,
    $Browser,

    $CopyUser,

    $CRLF,

    $EditCharFormatted1,
    $EditCharPos1,
    $EditCharValue1,
    $EditEditValue1,   
    $EditEditPos1,    
    $EditFieldActualSize1,
    $EditFieldActualSize2,
    $EditFieldLabel1,
    $EditFieldLabel2,
    $EditFieldMaxSize1,
    $EditFieldMaxSize2,
    $EditFieldMinSize1,
    $EditFieldMinSize2,
    $EditFieldName1,    
    $EditFieldName2, 
    $EditFieldPos1,    
    $EditFieldPos2,    
    $EditFieldValue1,    
    $EditFieldValue2, 
    $EditLowValue,
    $EditHighValue,
    $EditParmName1,    
    $EditParmName2,
    $EditParmValue1,    
    $EditParmValue2,
    $EditParmValue3,
    $EditSubParmLabel1,
    $EditSubParm1LegalValues,
    $EditSubParmName1,
    $EditSubParmNum1,
    $EditSubParmNum2,
    $EditSubParmPos1,  
    $EditSubParmPos2,
    $EditSubParmPos3,
    $EditSubParmPos4,
    $EditSubParmValue1,    
    $EditSubParmValue2,
    $EditSubParmValue3,
    $EditSubParmValue4,
    $EditTestValue,

    $ErrorMessagEC,
    $ErrorMessageSpam,
    $ErrorNumber,
    $ErrorPrefix,
    $ErrorSequenceNumber,
    $ErrorSuffix,
    $ErrorsWritten,

    $FormCSVFileName,
    $FormEchoUser,
    $FormEmail,
    $FormEmailConfirmation,
    $FormEmailConfirmationField,
    $FormEmailConfirmationFieldLabel,
    $FormEmailField,
    $FormEmailFieldLabel,
    $FormEmailFieldList,

    $FormErrorPageCSSClassCount,
    $FormErrorPageErrorMsgClass,
    $FormErrorPageErrorMsgColor,
    $FormErrorPageErrorMsgFace,
    $FormErrorPageErrorMsgSize,
    $FormErrorPageFooterClass,
    $FormErrorPageFooterColor,
    $FormErrorPageFooterFace,
    $FormErrorPageFooterSize,
    $FormErrorPageHeading1,
    $FormErrorPageHeading1Bold,
    $FormErrorPageHeading1Class,
    $FormErrorPageHeading1Color,
    $FormErrorPageHeading1Face,
    $FormErrorPageHeading1Size,
    $FormErrorPageHeading2,
    $FormErrorPageHeading2Bold,
    $FormErrorPageHeading2Class,
    $FormErrorPageHeading2Color,
    $FormErrorPageHeading2Face,
    $FormErrorPageHeading2Size,
    $FormErrorPageLastCSSClassField,
    $FormErrorPageLastFormatField,
    $FormErrorPageLinEClosing,
    $FormErrorPageLinEClosingBold,
    $FormErrorPageLinEClosingClass,
    $FormErrorPageLinEClosingColor,
    $FormErrorPageLinEClosingFace,
    $FormErrorPageLinEClosingSize,
    $FormErrorPageLineOpening,
    $FormErrorPageLineOpeningBold,
    $FormErrorPageLineOpeningClass,
    $FormErrorPageLineOpeningColor,
    $FormErrorPageLineOpeningFace,    
    $FormErrorPageLineOpeningSize,
    $FormErrorPageTemplate,    
    $FormErrorPageTemplateContents,
    $FormErrorPageTitle,
    $FormErrorPageTrackingInfo,

    $FormFieldNameEditList,
    $FormFieldNameEditListArray,
    $FormFieldNameExcludEArray,
    $FormFieldNameLabelArray,
    $FormFieldNameLabelListArray,
    $FormFieldNameLabelPlusList,
    $FormFieldNameLabelPlusListArray,
    $FormFieldNameMinSizEArray,
    $FormFieldNameMaxSizEArray,
    $FormFieldNameRequiredArray,
    $FormName,
    $FormNamEField,
    $FormNameFieldList,
    $FormNextURL,
    $FormOutputFieldInfo,
    $FormPleaseForgiveMyUseOfAWindowsServer,
    $FormTestEmailDomain,
    $FormTestEmailFormat,
    $FormTestFieldMinLengths,
    $FormTestFieldMaxLengths,
    $FormTestInjectionExploits,

    $HoldMsg1AddrList,
    $HoldMsg1Subject,

    $HoldMsg2AddrList,
    $HoldMsg2Subject,

    $IP,
    $Message, 

    $Msg0AddrList,
    $Msg0DefaultFromAddr,
    $Msg0FieldLabelValueSeparator, 
    $Msg0FieldNameExcludEArray,
    $Msg0FieldNameExcludeListArray,
    $Msg0FieldNameLabelList,
    $Msg0FieldNameLabelListArray,
    $Msg0FieldNameLabelListArrayDefault,
    $Msg0FieldNameValueSubstitutionArray,
    $Msg0FieldNameValueSubstitutionList,
    $Msg0FieldValueTerminator,
    $Msg0ForcEDefaultFromAddr,
    $Msg0Subject,
    $Msg0TextBottom,
    $Msg0TextTop,

    $Msg1LabelSubjectAndAddressesDropDown,
    $Msg1AddrList,
    $Msg1AddrListAndSubjectSetByDropDown,
    $Msg1DefaultFromAddr,
    $Msg1FieldLabelValueSeparator,
    $Msg1FieldNameExcludeList,
    $Msg1FieldNameExcludeListArray,
    $Msg1FieldNameLabelList,
    $Msg1FieldNameLabelListArray,
    $Msg1FieldNameValueSubstitutionArray,
    $Msg1FieldNameValueSubstitutionList,
    $Msg1FieldNameValueSubstitutionList2,
    $Msg1ForcEDefaultFromAddr,
    $Msg1Subject,
    $Msg1SubjectField,
    $Msg1TextBottom,
    $Msg1TextTop,

    $Msg2LabelSubjectAndAddressesDropDown,
    $Msg2AddrList,
    $Msg2AddrListAndSubjectSetByDropDown,
    $Msg2DefaultFromAddr,
    $Msg2FieldLabelValueSeparator,
    $Msg2FieldNameExcludeList,
    $Msg2FieldNameExcludeListArray,
    $Msg2FieldNameLabelList,
    $Msg2FieldNameLabelListArray,
    $Msg2FieldNameValueSubstitutionArray,
    $Msg2FieldNameValueSubstitutionList,
    $Msg2FieldNameValueSubstitutionList2,
    $Msg2ForcEDefaultFromAddr,
    $Msg2Subject,
    $Msg2SubjectField,
    $Msg2TextBottom,
    $Msg2TextTop,

    $MsgEchoAddressee,
    $MsgEchoFromAddr,
    $MsgEchoFieldLabelValueSeparator,
    $MsgEchoFieldNameExcludeList,
    $MsgEchoFieldNameExcludeListArray,
    $MsgEchoFieldNameLabelList,
    $MsgEchoFieldNameLabelListArray,
    $MsgEchoFieldNameValueSubstitutionArray,
    $MsgEchoFieldNameValueSubstitutionList,
    $MsgEchoFieldNameValueSubstitutionLists,
    $MsgEchoSubject,
    $MsgEchoTextBottom,
    $MsgEchoTextTop,

    $MsgNumber,

    $NextURL,
    $PHPVersion,
    $Referer,
    $ProcessFormFieldNameLabelPlusListDone,
    $ScriptPathShort,
    $ScriptPathLong,
    $ScriptStartTime,    
    $ScriptVersion,
    $TemplateErrorPlacementString,
    $ValidFieldEditsArray;



$Msg1LabelSubjectAndAddressesDropDown    = "";
$Msg1AddrList                            = "";
$Msg1DefaultFromAddr                     = "";
$Msg1FieldLabelValueSeparator            = "";
$Msg1FieldNameExcludeList                = "";
$Msg1FieldNameLabelList                  = "";
$Msg1FieldNameValueSubstitutionList      = "";
$Msg1FieldNameValueSubstitutionList2     = "";
$Msg1ForcEDefaultFromAddr                = "";
$Msg1Subject                             = "";
$Msg1SubjectField                        = "";
$Msg1TextBottom                          = "";
$Msg1TextTop                             = "";

$Msg2LabelSubjectAndAddressesDropDown         = "";
$Msg2AddrList                            = "";
$Msg2DefaultFromAddr                     = "";
$Msg2FieldLabelValueSeparator            = "";
$Msg2FieldNameExcludeList                = "";
$Msg2FieldNameLabelList                  = "";
$Msg2FieldNameValueSubstitutionList      = "";
$Msg2FieldNameValueSubstitutionList2     = "";
$Msg2ForcEDefaultFromAddr                = "";
$Msg2Subject                             = "";
$Msg2SubjectField                        = "";
$Msg2TextBottom                          = "";
$Msg2TextTop                             = "";

$MsgEchoAddressee                        = "";
$MsgEchoFromAddr                         = "";
$MsgEchoFieldLabelValueSeparator         = "";
$MsgEchoFieldNameExcludeList             = "";
$MsgEchoFieldNameLabelList               = "";
$MsgEchoFieldNameValueSubstitutionList   = "";
$MsgEchoFieldNameValueSubstitutionList2  = "";
$MsgEchoSubject                          = "";
$MsgEchoTextBottom                       = "";
$MsgEchoTextTop                          = "";

}  //  End of CreateMsgLevelParameters ()




//*************************************************************
//  FUNCTION: LoadMsgLevelParameters ()
//*************************************************************

function LoadMsgLevelParameters () {

global 
    $at,
    $Browser,

    $CopyUser,

    $CRLF,

    $EditCharFormatted1,
    $EditCharPos1,
    $EditCharValue1,
    $EditEditValue1,   
    $EditEditPos1,    
    $EditFieldActualSize1,
    $EditFieldActualSize2,
    $EditFieldLabel1,
    $EditFieldLabel2,
    $EditFieldMaxSize1,
    $EditFieldMaxSize2,
    $EditFieldMinSize1,
    $EditFieldMinSize2,
    $EditFieldName1,    
    $EditFieldName2, 
    $EditFieldPos1,    
    $EditFieldPos2,    
    $EditFieldValue1,    
    $EditFieldValue2, 
    $EditLowValue,
    $EditHighValue,
    $EditParmName1,    
    $EditParmName2,
    $EditParmValue1,    
    $EditParmValue2,
    $EditParmValue3,
    $EditSubParmLabel1,
    $EditSubParm1LegalValues,
    $EditSubParmName1,
    $EditSubParmNum1,
    $EditSubParmNum2,
    $EditSubParmPos1,  
    $EditSubParmPos2,
    $EditSubParmPos3,
    $EditSubParmPos4,
    $EditSubParmValue1,    
    $EditSubParmValue2,
    $EditSubParmValue3,
    $EditSubParmValue4,
    $EditTestValue,

    $ErrorMessagEC,
    $ErrorMessageSpam,
    $ErrorNumber,
    $ErrorPrefix,
    $ErrorSequenceNumber,
    $ErrorSuffix,
    $ErrorsWritten,

    $FormCSVFileName,
    $FormEchoUser,
    $FormEmail,
    $FormEmailConfirmation,
    $FormEmailConfirmationField,
    $FormEmailConfirmationFieldLabel,
    $FormEmailField,
    $FormEmailFieldLabel,
    $FormEmailFieldList,

    $FormErrorPageCSSClassCount,
    $FormErrorPageErrorMsgClass,
    $FormErrorPageErrorMsgColor,
    $FormErrorPageErrorMsgFace,
    $FormErrorPageErrorMsgSize,
    $FormErrorPageFooterClass,
    $FormErrorPageFooterColor,
    $FormErrorPageFooterFace,
    $FormErrorPageFooterSize,
    $FormErrorPageHeading1,
    $FormErrorPageHeading1Bold,
    $FormErrorPageHeading1Class,
    $FormErrorPageHeading1Color,
    $FormErrorPageHeading1Face,
    $FormErrorPageHeading1Size,
    $FormErrorPageHeading2,
    $FormErrorPageHeading2Bold,
    $FormErrorPageHeading2Class,
    $FormErrorPageHeading2Color,
    $FormErrorPageHeading2Face,
    $FormErrorPageHeading2Size,
    $FormErrorPageLastCSSClassField,
    $FormErrorPageLastFormatField,
    $FormErrorPageLinEClosing,
    $FormErrorPageLinEClosingBold,
    $FormErrorPageLinEClosingClass,
    $FormErrorPageLinEClosingColor,
    $FormErrorPageLinEClosingFace,
    $FormErrorPageLinEClosingSize,
    $FormErrorPageLineOpening,
    $FormErrorPageLineOpeningBold,
    $FormErrorPageLineOpeningClass,
    $FormErrorPageLineOpeningColor,
    $FormErrorPageLineOpeningFace,    
    $FormErrorPageLineOpeningSize,
    $FormErrorPageTemplate, 
    $FormErrorPageTemplateContents,   
    $FormErrorPageTitle,
    $FormErrorPageTrackingInfo,

    $FormFieldNameEditList,
    $FormFieldNameEditListArray,
    $FormFieldNameExcludEArray,
    $FormFieldNameLabelArray,
    $FormFieldNameLabelListArray,
    $FormFieldNameLabelPlusList,
    $FormFieldNameLabelPlusListArray,
    $FormFieldNameMinSizEArray,
    $FormFieldNameMaxSizEArray,
    $FormFieldNameRequiredArray,
    $FormName,
    $FormNamEField,
    $FormNameFieldList,
    $FormNextURL,
    $FormOutputFieldInfo,
    $FormPleaseForgiveMyUseOfAWindowsServer,
    $FormTestEmailDomain,
    $FormTestEmailFormat,
    $FormTestFieldMinLengths,
    $FormTestFieldMaxLengths,
    $FormTestInjectionExploits,

    $HoldMsg1AddrList,
    $HoldMsg1Subject,

    $HoldMsg2AddrList,
    $HoldMsg2Subject,

    $IP,
    $Message, 

    $Msg0AddrList,
    $Msg0DefaultFromAddr,
    $Msg0FieldLabelValueSeparator, 
    $Msg0FieldNameExcludEArray,
    $Msg0FieldNameExcludeListArray,
    $Msg0FieldNameLabelList,
    $Msg0FieldNameLabelListArray,
    $Msg0FieldNameLabelListArrayDefault,
    $Msg0FieldNameValueSubstitutionArray,
    $Msg0FieldNameValueSubstitutionList,
    $Msg0FieldValueTerminator,
    $Msg0ForcEDefaultFromAddr,
    $Msg0Subject,
    $Msg0TextBottom,
    $Msg0TextTop,

    $Msg1LabelSubjectAndAddressesDropDown,
    $Msg1AddrList,
    $Msg1AddrListAndSubjectSetByDropDown,
    $Msg1DefaultFromAddr,
    $Msg1FieldLabelValueSeparator,
    $Msg1FieldNameExcludeList,
    $Msg1FieldNameExcludeListArray,
    $Msg1FieldNameLabelList,
    $Msg1FieldNameLabelListArray,
    $Msg1FieldNameValueSubstitutionArray,
    $Msg1FieldNameValueSubstitutionList,
    $Msg1FieldNameValueSubstitutionList2,
    $Msg1ForcEDefaultFromAddr,
    $Msg1Subject,
    $Msg1SubjectField,
    $Msg1TextBottom,
    $Msg1TextTop,

    $Msg2LabelSubjectAndAddressesDropDown,
    $Msg2AddrList,
    $Msg2AddrListAndSubjectSetByDropDown,
    $Msg2DefaultFromAddr,
    $Msg2FieldLabelValueSeparator,
    $Msg2FieldNameExcludeList,
    $Msg2FieldNameExcludeListArray,
    $Msg2FieldNameLabelList,
    $Msg2FieldNameLabelListArray,
    $Msg2FieldNameValueSubstitutionArray,
    $Msg2FieldNameValueSubstitutionList,
    $Msg2FieldNameValueSubstitutionList2,
    $Msg2ForcEDefaultFromAddr,
    $Msg2Subject,
    $Msg2SubjectField,
    $Msg2TextBottom,
    $Msg2TextTop,

    $MsgEchoAddressee,
    $MsgEchoFromAddr,
    $MsgEchoFieldLabelValueSeparator,
    $MsgEchoFieldNameExcludeList,
    $MsgEchoFieldNameExcludeListArray,
    $MsgEchoFieldNameLabelList,
    $MsgEchoFieldNameLabelListArray,
    $MsgEchoFieldNameValueSubstitutionArray,
    $MsgEchoFieldNameValueSubstitutionList,
    $MsgEchoFieldNameValueSubstitutionLists,
    $MsgEchoSubject,
    $MsgEchoTextBottom,
    $MsgEchoTextTop,

    $MsgNumber,

    $NextURL,
    $PHPVersion,
    $Referer,
    $ProcessFormFieldNameLabelPlusListDone,
    $ScriptPathShort,
    $ScriptPathLong,
    $ScriptStartTime,    
    $ScriptVersion,
    $TemplateErrorPlacementString,
    $ValidFieldEditsArray;

if (array_key_exists ("Msg1LabelSubjectAndAddressesDropDown", $_POST)) {
    $Msg1LabelSubjectAndAddressesDropDown
        = trim(stripslashes(strip_tags($_POST["Msg1LabelSubjectAndAddressesDropDown"])));
}

if (array_key_exists ("Msg1AddrList", $_POST)) { 
    $Msg1AddrList     
        = trim(stripslashes(strip_tags($_POST["Msg1AddrList"]))); 
}

if (array_key_exists ("Msg1DefaultFromAddr", $_POST)) { 
    $Msg1DefaultFromAddr     
        = trim(stripslashes(strip_tags($_POST["Msg1DefaultFromAddr"]))); 
}

if (array_key_exists ("Msg1FieldLabelValueSeparator", $_POST)) { 
    $Msg1FieldLabelValueSeparator     
        = trim(stripslashes(strip_tags($_POST["Msg1FieldLabelValueSeparator"]))); 
}

if (array_key_exists ("Msg1FieldNameExcludeList", $_POST)) { 
    $Msg1FieldNameExcludeList     
        = trim(stripslashes(strip_tags($_POST["Msg1FieldNameExcludeList"]))); 
}

if (array_key_exists ("Msg1FieldNameLabelList", $_POST)) { 
    $Msg1FieldNameLabelList     
        = trim(stripslashes(strip_tags($_POST["Msg1FieldNameLabelList"]))); 
}

if (array_key_exists ("Msg1FieldNameValueSubstitutionList", $_POST)) { 
    $Msg1FieldNameValueSubstitutionList     
        = trim(stripslashes(strip_tags($_POST["Msg1FieldNameValueSubstitutionList"]))); 
}

if (array_key_exists ("Msg1FieldNameValueSubstitutionList2", $_POST)) {
    $Msg1FieldNameValueSubstitutionList2
        = trim(stripslashes(strip_tags($_POST["Msg1FieldNameValueSubstitutionList2"])));
}

if (array_key_exists ("Msg1ForcEDefaultFromAddr", $_POST)) {
    $Msg1ForcEDefaultFromAddr     
        = trim(stripslashes(strip_tags($_POST["Msg1ForcEDefaultFromAddr"]))); 
}

if (array_key_exists ("Msg1Subject", $_POST)) { 
    $Msg1Subject     
        = trim(stripslashes(strip_tags($_POST["Msg1Subject"]))); 
}

if (array_key_exists ("Msg1SubjectField", $_POST)) { 
    $Msg1SubjectField     
        = trim(stripslashes(strip_tags($_POST["Msg1SubjectField"]))); 
}

if (array_key_exists ("Msg1TextBottom", $_POST)) { 
    $Msg1TextBottom     
        = trim(stripslashes(strip_tags($_POST["Msg1TextBottom"]))); 
}

if (array_key_exists ("Msg1TextTop", $_POST)) { 
    $Msg1TextTop     
        = trim(stripslashes(strip_tags($_POST["Msg1TextTop"]))); 
}


if (array_key_exists ("Msg2LabelSubjectAndAddressesDropDown", $_POST)) {
    $Msg2LabelSubjectAndAddressesDropDown
        = trim(stripslashes(strip_tags($_POST["Msg2LabelSubjectAndAddressesDropDown"])));
}

if (array_key_exists ("Msg2AddrList", $_POST)) { 
    $Msg2AddrList     
        = trim(stripslashes(strip_tags($_POST["Msg2AddrList"]))); 
}

if (array_key_exists ("Msg2DefaultFromAddr", $_POST)) {
    $Msg2DefaultFromAddr     
        = trim(stripslashes(strip_tags($_POST["Msg2DefaultFromAddr"])));
}

if (array_key_exists ("Msg2FieldLabelValueSeparator", $_POST)) {
    $Msg2FieldLabelValueSeparator     
        = trim(stripslashes(strip_tags($_POST["Msg2FieldLabelValueSeparator"])));
}

if (array_key_exists ("Msg2FieldNameExcludeList", $_POST)) {
    $Msg2FieldNameExcludeList     
        = trim(stripslashes(strip_tags($_POST["Msg2FieldNameExcludeList"])));
}

if (array_key_exists ("Msg2FieldNameLabelList", $_POST)) {
    $Msg2FieldNameLabelList     
        = trim(stripslashes(strip_tags($_POST["Msg2FieldNameLabelList"])));
}

if (array_key_exists ("Msg2FieldNameValueSubstitutionList2", $_POST)) {
    $Msg2FieldNameValueSubstitutionList2
        = trim(stripslashes(strip_tags($_POST["Msg2FieldNameValueSubstitutionList2"])));
}

if (array_key_exists ("Msg2FieldNameValueSubstitutionList", $_POST)) {
    $Msg2FieldNameValueSubstitutionList
        = trim(stripslashes(strip_tags($_POST["Msg2FieldNameValueSubstitutionList"])));
}

if (array_key_exists ("Msg2ForcEDefaultFromAddr", $_POST)) {
    $Msg2ForcEDefaultFromAddr     
        = trim(stripslashes(strip_tags($_POST["Msg2ForcEDefaultFromAddr"])));
}

if (array_key_exists ("Msg2Subject", $_POST)) {
    $Msg2Subject     
        = trim(stripslashes(strip_tags($_POST["Msg2Subject"])));
}

if (array_key_exists ("Msg2SubjectField", $_POST)) {
    $Msg2SubjectField     
        = trim(stripslashes(strip_tags($_POST["Msg2SubjectField"])));
}

if (array_key_exists ("Msg2TextBottom", $_POST)) {
    $Msg2TextBottom     
        = trim(stripslashes(strip_tags($_POST["Msg2TextBottom"])));
}

if (array_key_exists ("Msg2TextTop", $_POST)) {
    $Msg2TextTop     
        = trim(stripslashes(strip_tags($_POST["Msg2TextTop"])));
}


if (array_key_exists ("MsgEchoAddressee", $_POST)) {
    $MsgEchoAddressee     
        = trim(stripslashes(strip_tags($_POST["MsgEchoAddressee"])));
}

if (array_key_exists ("MsgEchoFromAddr", $_POST)) {
    $MsgEchoFromAddr     
        = trim(stripslashes(strip_tags($_POST["MsgEchoFromAddr"])));
}

if (array_key_exists ("MsgEchoFieldLabelValueSeparator", $_POST)) {
    $MsgEchoFieldLabelValueSeparator     
        = trim(stripslashes(strip_tags($_POST["MsgEchoFieldLabelValueSeparator"])));
}

if (array_key_exists ("MsgEchoFieldNameExcludeList", $_POST)) {
    $MsgEchoFieldNameExcludeList     
        = trim(stripslashes(strip_tags($_POST["MsgEchoFieldNameExcludeList"])));
}

if (array_key_exists ("MsgEchoFieldNameLabelList", $_POST)) {
    $MsgEchoFieldNameLabelList     
        = trim(stripslashes(strip_tags($_POST["MsgEchoFieldNameLabelList"])));
}

if (array_key_exists ("MsgEchoFieldNameValueSubstitutionList", $_POST)) {
    $MsgEchoFieldNameValueSubstitutionList     
        = trim(stripslashes(strip_tags($_POST["MsgEchoFieldNameValueSubstitutionList"])));
}

if (array_key_exists ("MsgEchoFieldNameValueSubstitutionList2", $_POST)) {
    $MsgEchoFieldNameValueSubstitutionList2
        = trim(stripslashes(strip_tags($_POST["MsgEchoFieldNameValueSubstitutionList2"])));
}

if (array_key_exists ("MsgEchoSubject", $_POST)) {
    $MsgEchoSubject     
        = trim(stripslashes(strip_tags($_POST["MsgEchoSubject"])));
}

if (array_key_exists ("MsgEchoTextBottom", $_POST)) {
    $MsgEchoTextBottom     
        = trim(stripslashes(strip_tags($_POST["MsgEchoTextBottom"])));
}

if (array_key_exists ("MsgEchoTextTop", $_POST)) {
    $MsgEchoTextTop     
        = trim(stripslashes(strip_tags($_POST["MsgEchoTextTop"])));
}

}  //  End of LoadMsgLevelParameters ()




//*************************************************************
//  FUNCTION: OutputPageHead ($Title, $Description)
//*************************************************************

function OutputPageHead ($Title, $Description) {

global 
    $at,
    $Browser,

    $CopyUser,

    $CRLF,

    $EditCharFormatted1,
    $EditCharPos1,
    $EditCharValue1,
    $EditEditValue1,   
    $EditEditPos1,    
    $EditFieldActualSize1,
    $EditFieldActualSize2,
    $EditFieldLabel1,
    $EditFieldLabel2,
    $EditFieldMaxSize1,
    $EditFieldMaxSize2,
    $EditFieldMinSize1,
    $EditFieldMinSize2,
    $EditFieldName1,    
    $EditFieldName2, 
    $EditFieldPos1,    
    $EditFieldPos2,    
    $EditFieldValue1,    
    $EditFieldValue2, 
    $EditLowValue,
    $EditHighValue,
    $EditParmName1,    
    $EditParmName2,
    $EditParmValue1,    
    $EditParmValue2,
    $EditParmValue3,
    $EditSubParmLabel1,
    $EditSubParm1LegalValues,
    $EditSubParmName1,
    $EditSubParmNum1,
    $EditSubParmNum2,
    $EditSubParmPos1,  
    $EditSubParmPos2,
    $EditSubParmPos3,
    $EditSubParmPos4,
    $EditSubParmValue1,    
    $EditSubParmValue2,
    $EditSubParmValue3,
    $EditSubParmValue4,
    $EditTestValue,

    $ErrorMessagEC,
    $ErrorMessageSpam,
    $ErrorNumber,
    $ErrorPrefix,
    $ErrorSequenceNumber,
    $ErrorSuffix,
    $ErrorsWritten,

    $FormCSVFileName,
    $FormEchoUser,
    $FormEmail,
    $FormEmailConfirmation,
    $FormEmailConfirmationField,
    $FormEmailConfirmationFieldLabel,
    $FormEmailField,
    $FormEmailFieldLabel,
    $FormEmailFieldList,

    $FormErrorPageCSSClassCount,
    $FormErrorPageErrorMsgClass,
    $FormErrorPageErrorMsgColor,
    $FormErrorPageErrorMsgFace,
    $FormErrorPageErrorMsgSize,
    $FormErrorPageFooterClass,
    $FormErrorPageFooterColor,
    $FormErrorPageFooterFace,
    $FormErrorPageFooterSize,
    $FormErrorPageHeading1,
    $FormErrorPageHeading1Bold,
    $FormErrorPageHeading1Class,
    $FormErrorPageHeading1Color,
    $FormErrorPageHeading1Face,
    $FormErrorPageHeading1Size,
    $FormErrorPageHeading2,
    $FormErrorPageHeading2Bold,
    $FormErrorPageHeading2Class,
    $FormErrorPageHeading2Color,
    $FormErrorPageHeading2Face,
    $FormErrorPageHeading2Size,
    $FormErrorPageLastCSSClassField,
    $FormErrorPageLastFormatField,
    $FormErrorPageLinEClosing,
    $FormErrorPageLinEClosingBold,
    $FormErrorPageLinEClosingClass,
    $FormErrorPageLinEClosingColor,
    $FormErrorPageLinEClosingFace,
    $FormErrorPageLinEClosingSize,
    $FormErrorPageLineOpening,
    $FormErrorPageLineOpeningBold,
    $FormErrorPageLineOpeningClass,
    $FormErrorPageLineOpeningColor,
    $FormErrorPageLineOpeningFace,    
    $FormErrorPageLineOpeningSize,
    $FormErrorPageTemplate,    
    $FormErrorPageTemplateContents,
    $FormErrorPageTitle,
    $FormErrorPageTrackingInfo,

    $FormFieldNameEditList,
    $FormFieldNameEditListArray,
    $FormFieldNameExcludEArray,
    $FormFieldNameLabelArray,
    $FormFieldNameLabelListArray,
    $FormFieldNameLabelPlusList,
    $FormFieldNameLabelPlusListArray,
    $FormFieldNameMinSizEArray,
    $FormFieldNameMaxSizEArray,
    $FormFieldNameRequiredArray,
    $FormName,
    $FormNamEField,
    $FormNameFieldList,
    $FormNextURL,
    $FormOutputFieldInfo,
    $FormPleaseForgiveMyUseOfAWindowsServer,
    $FormTestEmailDomain,
    $FormTestEmailFormat,
    $FormTestFieldMinLengths,
    $FormTestFieldMaxLengths,
    $FormTestInjectionExploits,

    $HoldMsg1AddrList,
    $HoldMsg1Subject,

    $HoldMsg2AddrList,
    $HoldMsg2Subject,

    $IP,
    $Message, 

    $Msg0AddrList,
    $Msg0DefaultFromAddr,
    $Msg0FieldLabelValueSeparator, 
    $Msg0FieldNameExcludEArray,
    $Msg0FieldNameExcludeListArray,
    $Msg0FieldNameLabelList,
    $Msg0FieldNameLabelListArray,
    $Msg0FieldNameLabelListArrayDefault,
    $Msg0FieldNameValueSubstitutionArray,
    $Msg0FieldNameValueSubstitutionList,
    $Msg0FieldValueTerminator,
    $Msg0ForcEDefaultFromAddr,
    $Msg0Subject,
    $Msg0TextBottom,
    $Msg0TextTop,

    $Msg1LabelSubjectAndAddressesDropDown,
    $Msg1AddrList,
    $Msg1AddrListAndSubjectSetByDropDown,
    $Msg1DefaultFromAddr,
    $Msg1FieldLabelValueSeparator,
    $Msg1FieldNameExcludeList,
    $Msg1FieldNameExcludeListArray,
    $Msg1FieldNameLabelList,
    $Msg1FieldNameLabelListArray,
    $Msg1FieldNameValueSubstitutionArray,
    $Msg1FieldNameValueSubstitutionList,
    $Msg1FieldNameValueSubstitutionList2,
    $Msg1ForcEDefaultFromAddr,
    $Msg1Subject,
    $Msg1SubjectField,
    $Msg1TextBottom,
    $Msg1TextTop,

    $Msg2LabelSubjectAndAddressesDropDown,
    $Msg2AddrList,
    $Msg2AddrListAndSubjectSetByDropDown,
    $Msg2DefaultFromAddr,
    $Msg2FieldLabelValueSeparator,
    $Msg2FieldNameExcludeList,
    $Msg2FieldNameExcludeListArray,
    $Msg2FieldNameLabelList,
    $Msg2FieldNameLabelListArray,
    $Msg2FieldNameValueSubstitutionArray,
    $Msg2FieldNameValueSubstitutionList,
    $Msg2FieldNameValueSubstitutionList2,
    $Msg2ForcEDefaultFromAddr,
    $Msg2Subject,
    $Msg2SubjectField,
    $Msg2TextBottom,
    $Msg2TextTop,

    $MsgEchoAddressee,
    $MsgEchoFromAddr,
    $MsgEchoFieldLabelValueSeparator,
    $MsgEchoFieldNameExcludeList,
    $MsgEchoFieldNameExcludeListArray,
    $MsgEchoFieldNameLabelList,
    $MsgEchoFieldNameLabelListArray,
    $MsgEchoFieldNameValueSubstitutionArray,
    $MsgEchoFieldNameValueSubstitutionList,
    $MsgEchoFieldNameValueSubstitutionLists,
    $MsgEchoSubject,
    $MsgEchoTextBottom,
    $MsgEchoTextTop,

    $MsgNumber,

    $NextURL,
    $PHPVersion,
    $Referer,
    $ProcessFormFieldNameLabelPlusListDone,
    $ScriptPathShort,
    $ScriptPathLong,
    $ScriptStartTime,    
    $ScriptVersion,
    $TemplateErrorPlacementString,
    $ValidFieldEditsArray;



echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">$CRLF";
echo "<html>$CRLF";
echo "<head>$CRLF";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=windows-1252\">$CRLF";
echo "<meta http-equiv=\"Content-Language\" content=\"en-us\">$CRLF";
echo "<title>$Title</title>$CRLF";
echo "<meta name=\"description\" content=\"$Description\">$CRLF";
echo "<meta name=\"copyright\" content=\"Copyright 2005-2012 James S. Huggins. See http://www.JamesSHuggins.com/copyright and http://www.JamesSHuggins.com/hefs\">$CRLF";
echo "<meta name=\"Author\" content=\"James S. Huggins\">$CRLF";
echo "<meta name=\"MSSmartTagsPreventParsing\" content=\"TRUE\">$CRLF";
echo "<meta http-equiv=\"imagetoolbar\" content=\"no\">$CRLF";
echo "</head>$CRLF";
echo "<body>$CRLF";

}  //  End of OutputPageHead ($Title, $Description)




//*************************************************************
//  FUNCTION: OutputFieldInfo ()
//*************************************************************

function OutputFieldInfo () {

global 
    $at,
    $Browser,

    $CopyUser,

    $CRLF,

    $EditCharFormatted1,
    $EditCharPos1,
    $EditCharValue1,
    $EditEditValue1,   
    $EditEditPos1,    
    $EditFieldActualSize1,
    $EditFieldActualSize2,
    $EditFieldLabel1,
    $EditFieldLabel2,
    $EditFieldMaxSize1,
    $EditFieldMaxSize2,
    $EditFieldMinSize1,
    $EditFieldMinSize2,
    $EditFieldName1,    
    $EditFieldName2, 
    $EditFieldPos1,    
    $EditFieldPos2,    
    $EditFieldValue1,    
    $EditFieldValue2, 
    $EditLowValue,
    $EditHighValue,
    $EditParmName1,    
    $EditParmName2,
    $EditParmValue1,    
    $EditParmValue2,
    $EditParmValue3,
    $EditSubParmLabel1,
    $EditSubParm1LegalValues,
    $EditSubParmName1,
    $EditSubParmNum1,
    $EditSubParmNum2,
    $EditSubParmPos1,  
    $EditSubParmPos2,
    $EditSubParmPos3,
    $EditSubParmPos4,
    $EditSubParmValue1,    
    $EditSubParmValue2,
    $EditSubParmValue3,
    $EditSubParmValue4,
    $EditTestValue,

    $ErrorMessagEC,
    $ErrorMessageSpam,
    $ErrorNumber,
    $ErrorPrefix,
    $ErrorSequenceNumber,
    $ErrorSuffix,
    $ErrorsWritten,

    $FormCSVFileName,
    $FormEchoUser,
    $FormEmail,
    $FormEmailConfirmation,
    $FormEmailConfirmationField,
    $FormEmailConfirmationFieldLabel,
    $FormEmailField,
    $FormEmailFieldLabel,
    $FormEmailFieldList,

    $FormErrorPageCSSClassCount,
    $FormErrorPageErrorMsgClass,
    $FormErrorPageErrorMsgColor,
    $FormErrorPageErrorMsgFace,
    $FormErrorPageErrorMsgSize,
    $FormErrorPageFooterClass,
    $FormErrorPageFooterColor,
    $FormErrorPageFooterFace,
    $FormErrorPageFooterSize,
    $FormErrorPageHeading1,
    $FormErrorPageHeading1Bold,
    $FormErrorPageHeading1Class,
    $FormErrorPageHeading1Color,
    $FormErrorPageHeading1Face,
    $FormErrorPageHeading1Size,
    $FormErrorPageHeading2,
    $FormErrorPageHeading2Bold,
    $FormErrorPageHeading2Class,
    $FormErrorPageHeading2Color,
    $FormErrorPageHeading2Face,
    $FormErrorPageHeading2Size,
    $FormErrorPageLastCSSClassField,
    $FormErrorPageLastFormatField,
    $FormErrorPageLinEClosing,
    $FormErrorPageLinEClosingBold,
    $FormErrorPageLinEClosingClass,
    $FormErrorPageLinEClosingColor,
    $FormErrorPageLinEClosingFace,
    $FormErrorPageLinEClosingSize,
    $FormErrorPageLineOpening,
    $FormErrorPageLineOpeningBold,
    $FormErrorPageLineOpeningClass,
    $FormErrorPageLineOpeningColor,
    $FormErrorPageLineOpeningFace,    
    $FormErrorPageLineOpeningSize,
    $FormErrorPageTemplate,    
    $FormErrorPageTemplateContents,
    $FormErrorPageTitle,
    $FormErrorPageTrackingInfo,

    $FormFieldNameEditList,
    $FormFieldNameEditListArray,
    $FormFieldNameExcludEArray,
    $FormFieldNameLabelArray,
    $FormFieldNameLabelListArray,
    $FormFieldNameLabelPlusList,
    $FormFieldNameLabelPlusListArray,
    $FormFieldNameMinSizEArray,
    $FormFieldNameMaxSizEArray,
    $FormFieldNameRequiredArray,
    $FormName,
    $FormNamEField,
    $FormNameFieldList,
    $FormNextURL,
    $FormOutputFieldInfo,
    $FormPleaseForgiveMyUseOfAWindowsServer,
    $FormTestEmailDomain,
    $FormTestEmailFormat,
    $FormTestFieldMinLengths,
    $FormTestFieldMaxLengths,
    $FormTestInjectionExploits,

    $HoldMsg1AddrList,
    $HoldMsg1Subject,

    $HoldMsg2AddrList,
    $HoldMsg2Subject,

    $IP,
    $Message, 

    $Msg0AddrList,
    $Msg0DefaultFromAddr,
    $Msg0FieldLabelValueSeparator, 
    $Msg0FieldNameExcludEArray,
    $Msg0FieldNameExcludeListArray,
    $Msg0FieldNameLabelList,
    $Msg0FieldNameLabelListArray,
    $Msg0FieldNameLabelListArrayDefault,
    $Msg0FieldNameValueSubstitutionArray,
    $Msg0FieldNameValueSubstitutionList,
    $Msg0FieldValueTerminator,
    $Msg0ForcEDefaultFromAddr,
    $Msg0Subject,
    $Msg0TextBottom,
    $Msg0TextTop,

    $Msg1LabelSubjectAndAddressesDropDown,
    $Msg1AddrList,
    $Msg1AddrListAndSubjectSetByDropDown,
    $Msg1DefaultFromAddr,
    $Msg1FieldLabelValueSeparator,
    $Msg1FieldNameExcludeList,
    $Msg1FieldNameExcludeListArray,
    $Msg1FieldNameLabelList,
    $Msg1FieldNameLabelListArray,
    $Msg1FieldNameValueSubstitutionArray,
    $Msg1FieldNameValueSubstitutionList,
    $Msg1FieldNameValueSubstitutionList2,
    $Msg1ForcEDefaultFromAddr,
    $Msg1Subject,
    $Msg1SubjectField,
    $Msg1TextBottom,
    $Msg1TextTop,

    $Msg2LabelSubjectAndAddressesDropDown,
    $Msg2AddrList,
    $Msg2AddrListAndSubjectSetByDropDown,
    $Msg2DefaultFromAddr,
    $Msg2FieldLabelValueSeparator,
    $Msg2FieldNameExcludeList,
    $Msg2FieldNameExcludeListArray,
    $Msg2FieldNameLabelList,
    $Msg2FieldNameLabelListArray,
    $Msg2FieldNameValueSubstitutionArray,
    $Msg2FieldNameValueSubstitutionList,
    $Msg2FieldNameValueSubstitutionList2,
    $Msg2ForcEDefaultFromAddr,
    $Msg2Subject,
    $Msg2SubjectField,
    $Msg2TextBottom,
    $Msg2TextTop,

    $MsgEchoAddressee,
    $MsgEchoFromAddr,
    $MsgEchoFieldLabelValueSeparator,
    $MsgEchoFieldNameExcludeList,
    $MsgEchoFieldNameExcludeListArray,
    $MsgEchoFieldNameLabelList,
    $MsgEchoFieldNameLabelListArray,
    $MsgEchoFieldNameValueSubstitutionArray,
    $MsgEchoFieldNameValueSubstitutionList,
    $MsgEchoFieldNameValueSubstitutionLists,
    $MsgEchoSubject,
    $MsgEchoTextBottom,
    $MsgEchoTextTop,

    $MsgNumber,

    $NextURL,
    $PHPVersion,
    $Referer,
    $ProcessFormFieldNameLabelPlusListDone,
    $ScriptPathShort,
    $ScriptPathLong,
    $ScriptStartTime,    
    $ScriptVersion,
    $TemplateErrorPlacementString,
    $ValidFieldEditsArray;

$ProcessFormFieldNameLabelPlusListDone = FALSE;
$FormFieldNameLabelPlusList = "all";
ProcessFormFieldNameLabelPlusList();

OutputPageHead ("Huggins' Email Form Script- Form Field Information", "This is a support page generated by Huggins' Email Form Script. See http://www.JamesSHuggins.com/hefs");

echo "<p>
<font face=\"Tahoma,Arial,sans-serif\" size=\"4\"><b>Huggins' Email Form Script</b></font><br>$CRLF";
echo "<font face=\"Tahoma,Arial,sans-serif\" size=\"3\">Form Field Information</font></p>$CRLF";

echo "<p>
<font face=\"Tahoma,Arial,sans-serif\" size=\"2\">
<b>Copy this if you need a concatenated field name list:</b>
</font></p>$CRLF";

echo "<p>value=\"";

$FirstOne = TRUE;
foreach ($FormFieldNameLabelArray as $VarField => $VarLabel) {
    $FieldName = trim($VarField);
    if ($FirstOne) {
        $FirstOne = FALSE;
        echo "$FieldName";
    } else {
        echo ", $FieldName";
    }
}

echo "\"</p>$CRLF<p>&nbsp;</p>$CRLF";

echo "<p>
<font face=\"Tahoma,Arial,sans-serif\" size=\"2\">
<b>Copy this if you need a stacked field name list:</b>
</font></p>$CRLF";

echo "<p>value=<br>$CRLF";

$FirstOne = TRUE;
foreach ($FormFieldNameLabelArray as $VarField => $VarLabel) {
    $FieldName = trim($VarField);
    if ($FirstOne) {
        $FirstOne = FALSE;
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\"$FieldName";
    } else {
        echo ", <br>$CRLF&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$FieldName";
    }
}

echo "\"</p>$CRLF<p>&nbsp;</p>$CRLF";

echo "<p>
<font face=\"Tahoma,Arial,sans-serif\" size=\"2\">
<b>Copy this for FormFieldNameLabelPlusList:</b>
</font></p>$CRLF";

echo "&lt;input name=\"FormFieldNameLabelPlusList\" type=\"hidden\" value=<br>$CRLF";

$FirstOne = TRUE;
foreach ($FormFieldNameLabelArray as $VarField => $VarLabel) {
    $FieldName = trim($VarField);
    $FieldLabel = trim($VarLabel);
    if ($FirstOne) {
        $FirstOne = FALSE;
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\"$FieldName, $FieldLabel, N, 0, 0";
    } else {
        echo ", <br>$CRLF&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$FieldName, $FieldLabel, N, 0, 0";
    }
}

echo "\"&gt; <br>
<br>$CRLF";

$FormErrorPageLinEClosing = " ";
WriteEndOfErrorPage("");

exit;
}  //  End of OutputFieldInfo ()




//*************************************************************
//  FUNCTION: EditFieldsForInjectionExploits ($TestType)
//*************************************************************

function EditFieldsForInjectionExploits ($TestType) {

global 
    $at,
    $Browser,

    $CopyUser,

    $CRLF,

    $EditCharFormatted1,
    $EditCharPos1,
    $EditCharValue1,
    $EditEditValue1,   
    $EditEditPos1,    
    $EditFieldActualSize1,
    $EditFieldActualSize2,
    $EditFieldLabel1,
    $EditFieldLabel2,
    $EditFieldMaxSize1,
    $EditFieldMaxSize2,
    $EditFieldMinSize1,
    $EditFieldMinSize2,
    $EditFieldName1,    
    $EditFieldName2, 
    $EditFieldPos1,    
    $EditFieldPos2,    
    $EditFieldValue1,    
    $EditFieldValue2, 
    $EditLowValue,
    $EditHighValue,
    $EditParmName1,    
    $EditParmName2,
    $EditParmValue1,    
    $EditParmValue2,
    $EditParmValue3,
    $EditSubParmLabel1,
    $EditSubParm1LegalValues,
    $EditSubParmName1,
    $EditSubParmNum1,
    $EditSubParmNum2,
    $EditSubParmPos1,  
    $EditSubParmPos2,
    $EditSubParmPos3,
    $EditSubParmPos4,
    $EditSubParmValue1,    
    $EditSubParmValue2,
    $EditSubParmValue3,
    $EditSubParmValue4,
    $EditTestValue,

    $ErrorMessagEC,
    $ErrorMessageSpam,
    $ErrorNumber,
    $ErrorPrefix,
    $ErrorSequenceNumber,
    $ErrorSuffix,
    $ErrorsWritten,

    $FormCSVFileName,
    $FormEchoUser,
    $FormEmail,
    $FormEmailConfirmation,
    $FormEmailConfirmationField,
    $FormEmailConfirmationFieldLabel,
    $FormEmailField,
    $FormEmailFieldLabel,
    $FormEmailFieldList,

    $FormErrorPageCSSClassCount,
    $FormErrorPageErrorMsgClass,
    $FormErrorPageErrorMsgColor,
    $FormErrorPageErrorMsgFace,
    $FormErrorPageErrorMsgSize,
    $FormErrorPageFooterClass,
    $FormErrorPageFooterColor,
    $FormErrorPageFooterFace,
    $FormErrorPageFooterSize,
    $FormErrorPageHeading1,
    $FormErrorPageHeading1Bold,
    $FormErrorPageHeading1Class,
    $FormErrorPageHeading1Color,
    $FormErrorPageHeading1Face,
    $FormErrorPageHeading1Size,
    $FormErrorPageHeading2,
    $FormErrorPageHeading2Bold,
    $FormErrorPageHeading2Class,
    $FormErrorPageHeading2Color,
    $FormErrorPageHeading2Face,
    $FormErrorPageHeading2Size,
    $FormErrorPageLastCSSClassField,
    $FormErrorPageLastFormatField,
    $FormErrorPageLinEClosing,
    $FormErrorPageLinEClosingBold,
    $FormErrorPageLinEClosingClass,
    $FormErrorPageLinEClosingColor,
    $FormErrorPageLinEClosingFace,
    $FormErrorPageLinEClosingSize,
    $FormErrorPageLineOpening,
    $FormErrorPageLineOpeningBold,
    $FormErrorPageLineOpeningClass,
    $FormErrorPageLineOpeningColor,
    $FormErrorPageLineOpeningFace,    
    $FormErrorPageLineOpeningSize,
    $FormErrorPageTemplate,    
    $FormErrorPageTemplateContents,
    $FormErrorPageTitle,
    $FormErrorPageTrackingInfo,

    $FormFieldNameEditList,
    $FormFieldNameEditListArray,
    $FormFieldNameExcludEArray,
    $FormFieldNameLabelArray,
    $FormFieldNameLabelListArray,
    $FormFieldNameLabelPlusList,
    $FormFieldNameLabelPlusListArray,
    $FormFieldNameMinSizEArray,
    $FormFieldNameMaxSizEArray,
    $FormFieldNameRequiredArray,
    $FormName,
    $FormNamEField,
    $FormNameFieldList,
    $FormNextURL,
    $FormOutputFieldInfo,
    $FormPleaseForgiveMyUseOfAWindowsServer,
    $FormTestEmailDomain,
    $FormTestEmailFormat,
    $FormTestFieldMinLengths,
    $FormTestFieldMaxLengths,
    $FormTestInjectionExploits,

    $HoldMsg1AddrList,
    $HoldMsg1Subject,

    $HoldMsg2AddrList,
    $HoldMsg2Subject,

    $IP,
    $Message, 

    $Msg0AddrList,
    $Msg0DefaultFromAddr,
    $Msg0FieldLabelValueSeparator, 
    $Msg0FieldNameExcludEArray,
    $Msg0FieldNameExcludeListArray,
    $Msg0FieldNameLabelList,
    $Msg0FieldNameLabelListArray,
    $Msg0FieldNameLabelListArrayDefault,
    $Msg0FieldNameValueSubstitutionArray,
    $Msg0FieldNameValueSubstitutionList,
    $Msg0FieldValueTerminator,
    $Msg0ForcEDefaultFromAddr,
    $Msg0Subject,
    $Msg0TextBottom,
    $Msg0TextTop,

    $Msg1LabelSubjectAndAddressesDropDown,
    $Msg1AddrList,
    $Msg1AddrListAndSubjectSetByDropDown,
    $Msg1DefaultFromAddr,
    $Msg1FieldLabelValueSeparator,
    $Msg1FieldNameExcludeList,
    $Msg1FieldNameExcludeListArray,
    $Msg1FieldNameLabelList,
    $Msg1FieldNameLabelListArray,
    $Msg1FieldNameValueSubstitutionArray,
    $Msg1FieldNameValueSubstitutionList,
    $Msg1FieldNameValueSubstitutionList2,
    $Msg1ForcEDefaultFromAddr,
    $Msg1Subject,
    $Msg1SubjectField,
    $Msg1TextBottom,
    $Msg1TextTop,

    $Msg2LabelSubjectAndAddressesDropDown,
    $Msg2AddrList,
    $Msg2AddrListAndSubjectSetByDropDown,
    $Msg2DefaultFromAddr,
    $Msg2FieldLabelValueSeparator,
    $Msg2FieldNameExcludeList,
    $Msg2FieldNameExcludeListArray,
    $Msg2FieldNameLabelList,
    $Msg2FieldNameLabelListArray,
    $Msg2FieldNameValueSubstitutionArray,
    $Msg2FieldNameValueSubstitutionList,
    $Msg2FieldNameValueSubstitutionList2,
    $Msg2ForcEDefaultFromAddr,
    $Msg2Subject,
    $Msg2SubjectField,
    $Msg2TextBottom,
    $Msg2TextTop,

    $MsgEchoAddressee,
    $MsgEchoFromAddr,
    $MsgEchoFieldLabelValueSeparator,
    $MsgEchoFieldNameExcludeList,
    $MsgEchoFieldNameExcludeListArray,
    $MsgEchoFieldNameLabelList,
    $MsgEchoFieldNameLabelListArray,
    $MsgEchoFieldNameValueSubstitutionArray,
    $MsgEchoFieldNameValueSubstitutionList,
    $MsgEchoFieldNameValueSubstitutionLists,
    $MsgEchoSubject,
    $MsgEchoTextBottom,
    $MsgEchoTextTop,

    $MsgNumber,

    $NextURL,
    $PHPVersion,
    $Referer,
    $ProcessFormFieldNameLabelPlusListDone,
    $ScriptPathShort,
    $ScriptPathLong,
    $ScriptStartTime,    
    $ScriptVersion,
    $TemplateErrorPlacementString,
    $ValidFieldEditsArray;

//-------------------------------------------------------------
//  Check for Injection Exploits
//-------------------------------------------------------------

$InjectionExploit = "/(content-type|bcc:|cc:|document.cookie|onclick|onload)/i";

foreach ($_POST as $VarKey => $VarValue) {
    
    $EditFieldValue1 = trim($VarValue);
    $EditParmValue1  = $EditFieldValue1;
    
    if (preg_match($InjectionExploit,$EditFieldValue1)) {

        $EditFieldName1  = trim($VarKey);
        $EditParmName1   = $EditFieldName1;
        $EditFieldLabel1 = trim($FormFieldNameLabelArray[$EditFieldName1]);

        if (JSHEmpty($EditFieldLabel1)) {
            $EditFieldLabel1 = $EditFieldName1;
        }

        if (
            substr(strtolower($VarKey), 0, 8)  == "copyuser" or         
            substr(strtolower($VarKey), 0, 8)  == "formecho" or
            substr(strtolower($VarKey), 0, 9)  == "formemail" or
            substr(strtolower($VarKey), 0, 9)  == "formerror" or
            substr(strtolower($VarKey), 0, 9)  == "formfield" or
            substr(strtolower($VarKey), 0, 8)  == "formname" or
            substr(strtolower($VarKey), 0, 11) == "formnexturl" or
            substr(strtolower($VarKey), 0, 10) == "formoutput" or
            substr(strtolower($VarKey), 0, 8)  == "formtest" or 
            substr(strtolower($VarKey), 0, 4)  == "msg1" or         
            substr(strtolower($VarKey), 0, 4)  == "msg2" or
            substr(strtolower($VarKey), 0, 7)  == "msgecho" or         
            substr(strtolower($VarKey), 0, 7)  == "nexturl"         
                  ) {

            if ($TestType == "C") {
                // Do the error for "C"
                WriteErrorMessage("C018");
            }

        } else {
            if ($TestType == "E") {
                // Do the error for "E"
                WriteErrorMessage("E010");
            }
        }
    }
}

}  //  End of EditFieldsForInjectionExploits ($TestType)




//*************************************************************
//  FUNCTION: EditFormLevelParameters ()
//*************************************************************

function EditFormLevelParameters () {

global 
    $at,
    $Browser,

    $CopyUser,

    $CRLF,

    $EditCharFormatted1,
    $EditCharPos1,
    $EditCharValue1,
    $EditEditValue1,   
    $EditEditPos1,    
    $EditFieldActualSize1,
    $EditFieldActualSize2,
    $EditFieldLabel1,
    $EditFieldLabel2,
    $EditFieldMaxSize1,
    $EditFieldMaxSize2,
    $EditFieldMinSize1,
    $EditFieldMinSize2,
    $EditFieldName1,    
    $EditFieldName2, 
    $EditFieldPos1,    
    $EditFieldPos2,    
    $EditFieldValue1,    
    $EditFieldValue2, 
    $EditLowValue,
    $EditHighValue,
    $EditParmName1,    
    $EditParmName2,
    $EditParmValue1,    
    $EditParmValue2,
    $EditParmValue3,
    $EditSubParmLabel1,
    $EditSubParm1LegalValues,
    $EditSubParmName1,
    $EditSubParmNum1,
    $EditSubParmNum2,
    $EditSubParmPos1,  
    $EditSubParmPos2,
    $EditSubParmPos3,
    $EditSubParmPos4,
    $EditSubParmValue1,    
    $EditSubParmValue2,
    $EditSubParmValue3,
    $EditSubParmValue4,
    $EditTestValue,

    $ErrorMessagEC,
    $ErrorMessageSpam,
    $ErrorNumber,
    $ErrorPrefix,
    $ErrorSequenceNumber,
    $ErrorSuffix,
    $ErrorsWritten,

    $FormCSVFileName,
    $FormEchoUser,
    $FormEmail,
    $FormEmailConfirmation,
    $FormEmailConfirmationField,
    $FormEmailConfirmationFieldLabel,
    $FormEmailField,
    $FormEmailFieldLabel,
    $FormEmailFieldList,

    $FormErrorPageCSSClassCount,
    $FormErrorPageErrorMsgClass,
    $FormErrorPageErrorMsgColor,
    $FormErrorPageErrorMsgFace,
    $FormErrorPageErrorMsgSize,
    $FormErrorPageFooterClass,
    $FormErrorPageFooterColor,
    $FormErrorPageFooterFace,
    $FormErrorPageFooterSize,
    $FormErrorPageHeading1,
    $FormErrorPageHeading1Bold,
    $FormErrorPageHeading1Class,
    $FormErrorPageHeading1Color,
    $FormErrorPageHeading1Face,
    $FormErrorPageHeading1Size,
    $FormErrorPageHeading2,
    $FormErrorPageHeading2Bold,
    $FormErrorPageHeading2Class,
    $FormErrorPageHeading2Color,
    $FormErrorPageHeading2Face,
    $FormErrorPageHeading2Size,
    $FormErrorPageLastCSSClassField,
    $FormErrorPageLastFormatField,
    $FormErrorPageLinEClosing,
    $FormErrorPageLinEClosingBold,
    $FormErrorPageLinEClosingClass,
    $FormErrorPageLinEClosingColor,
    $FormErrorPageLinEClosingFace,
    $FormErrorPageLinEClosingSize,
    $FormErrorPageLineOpening,
    $FormErrorPageLineOpeningBold,
    $FormErrorPageLineOpeningClass,
    $FormErrorPageLineOpeningColor,
    $FormErrorPageLineOpeningFace,    
    $FormErrorPageLineOpeningSize,
    $FormErrorPageTemplate,    
    $FormErrorPageTemplateContents,
    $FormErrorPageTitle,
    $FormErrorPageTrackingInfo,

    $FormFieldNameEditList,
    $FormFieldNameEditListArray,
    $FormFieldNameExcludEArray,
    $FormFieldNameLabelArray,
    $FormFieldNameLabelListArray,
    $FormFieldNameLabelPlusList,
    $FormFieldNameLabelPlusListArray,
    $FormFieldNameMinSizEArray,
    $FormFieldNameMaxSizEArray,
    $FormFieldNameRequiredArray,
    $FormName,
    $FormNamEField,
    $FormNameFieldList,
    $FormNextURL,
    $FormOutputFieldInfo,
    $FormPleaseForgiveMyUseOfAWindowsServer,
    $FormTestEmailDomain,
    $FormTestEmailFormat,
    $FormTestFieldMinLengths,
    $FormTestFieldMaxLengths,
    $FormTestInjectionExploits,

    $HoldMsg1AddrList,
    $HoldMsg1Subject,

    $HoldMsg2AddrList,
    $HoldMsg2Subject,

    $IP,
    $Message, 

    $Msg0AddrList,
    $Msg0DefaultFromAddr,
    $Msg0FieldLabelValueSeparator, 
    $Msg0FieldNameExcludEArray,
    $Msg0FieldNameExcludeListArray,
    $Msg0FieldNameLabelList,
    $Msg0FieldNameLabelListArray,
    $Msg0FieldNameLabelListArrayDefault,
    $Msg0FieldNameValueSubstitutionArray,
    $Msg0FieldNameValueSubstitutionList,
    $Msg0FieldValueTerminator,
    $Msg0ForcEDefaultFromAddr,
    $Msg0Subject,
    $Msg0TextBottom,
    $Msg0TextTop,

    $Msg1LabelSubjectAndAddressesDropDown,
    $Msg1AddrList,
    $Msg1AddrListAndSubjectSetByDropDown,
    $Msg1DefaultFromAddr,
    $Msg1FieldLabelValueSeparator,
    $Msg1FieldNameExcludeList,
    $Msg1FieldNameExcludeListArray,
    $Msg1FieldNameLabelList,
    $Msg1FieldNameLabelListArray,
    $Msg1FieldNameValueSubstitutionArray,
    $Msg1FieldNameValueSubstitutionList,
    $Msg1FieldNameValueSubstitutionList2,
    $Msg1ForcEDefaultFromAddr,
    $Msg1Subject,
    $Msg1SubjectField,
    $Msg1TextBottom,
    $Msg1TextTop,

    $Msg2LabelSubjectAndAddressesDropDown,
    $Msg2AddrList,
    $Msg2AddrListAndSubjectSetByDropDown,
    $Msg2DefaultFromAddr,
    $Msg2FieldLabelValueSeparator,
    $Msg2FieldNameExcludeList,
    $Msg2FieldNameExcludeListArray,
    $Msg2FieldNameLabelList,
    $Msg2FieldNameLabelListArray,
    $Msg2FieldNameValueSubstitutionArray,
    $Msg2FieldNameValueSubstitutionList,
    $Msg2FieldNameValueSubstitutionList2,
    $Msg2ForcEDefaultFromAddr,
    $Msg2Subject,
    $Msg2SubjectField,
    $Msg2TextBottom,
    $Msg2TextTop,

    $MsgEchoAddressee,
    $MsgEchoFromAddr,
    $MsgEchoFieldLabelValueSeparator,
    $MsgEchoFieldNameExcludeList,
    $MsgEchoFieldNameExcludeListArray,
    $MsgEchoFieldNameLabelList,
    $MsgEchoFieldNameLabelListArray,
    $MsgEchoFieldNameValueSubstitutionArray,
    $MsgEchoFieldNameValueSubstitutionList,
    $MsgEchoFieldNameValueSubstitutionLists,
    $MsgEchoSubject,
    $MsgEchoTextBottom,
    $MsgEchoTextTop,

    $MsgNumber,

    $NextURL,
    $PHPVersion,
    $Referer,
    $ProcessFormFieldNameLabelPlusListDone,
    $ScriptPathShort,
    $ScriptPathLong,
    $ScriptStartTime,    
    $ScriptVersion,
    $TemplateErrorPlacementString,
    $ValidFieldEditsArray;

//-------------------------------------------------------------
//  Begin $FormErrorPageTemplate Edit
//-------------------------------------------------------------

if ($FormErrorPageTemplate == "*") {
    $EditParmName1 == "FormErrorPageTemplate"; 
    WriteErrorMessage ("C022");
}

if (!JSHEmpty($FormErrorPageTemplate)) {
    $Handle = @fopen($FormErrorPageTemplate, "rt");
    if ($Handle == FALSE) {
        $EditParmName1  = "FormErrorPageTemplate";
        $EditParmValue1 = $FormErrorPageTemplate; 
        WriteErrorMessage("C024");
    }    

    $FormErrorPageTemplateContents = stream_get_contents($Handle);
    fclose($Handle);

    $Pos1 = strpos($FormErrorPageTemplateContents, $TemplateErrorPlacementString);

    if ($Pos1 == 0) {
        $EditParmName1  = "FormErrorPageTemplate";
        $EditParmValue1 = $FormErrorPageTemplate; 
        WriteErrorMessage("C025");
    }    
}

//-------------------------------------------------------------
//  End of $FormErrorPageTemplate Edit
//-------------------------------------------------------------


//-------------------------------------------------------------
//  Edit all config fields for injection exploits
//-------------------------------------------------------------

EditFieldsForInjectionExploits ("C");

//-------------------------------------------------------------
//  End of edit of all config fields for injection exploits
//-------------------------------------------------------------


//-------------------------------------------------------------
//  Temporary Field Edit
//-------------------------------------------------------------

//  FormFieldEmailField

if (array_key_exists ("FormFieldEmailField", $_POST)) {
    $EditParmName1    = "FormFieldEmailField";
    $EditParmValue1   = trim(stripslashes(strip_tags($_POST["FormFieldEmailField"])));
    $EditParmName2    = "FormEmailFieldList";
    WriteErrorMessage("C019");
}

//  FormFieldNamEFieldList

if (array_key_exists ("FormFieldNamEFieldList", $_POST)) {
    $EditParmName1    = "FormFieldNamEFieldList";
    $EditParmValue1   = trim(stripslashes(strip_tags($_POST["FormFieldNamEFieldList"])));
    $EditParmName2    = "FormNameFieldList";
    WriteErrorMessage("C019");
}

//  FormFieldNameValueSubstitutionList

if (array_key_exists ("FormFieldNameValueSubstitutionList", $_POST)) {
    $EditParmName1    = "FormFieldNameValueSubstitutionList";
    $EditParmValue1   = trim(stripslashes(strip_tags($_POST["FormFieldNameValueSubstitutionList"])));
    $EditParmName2    = "";
    WriteErrorMessage("C023");
}

//-------------------------------------------------------------
//  End of Temporary Field Edit
//-------------------------------------------------------------


//-------------------------------------------------------------
//  Begin Field Conflict Edit 
//-------------------------------------------------------------

//  MsgxFieldNameValueSubstitutionList and MsgxFieldNameValueSubstitutionList2

$EditParmName1 = "";
$EditParmName2 = "";

if (array_key_exists ("Msg1FieldNameValueSubstitutionList", $_POST)) {
    $EditParmName1 = "Msg1FieldNameValueSubstitutionList";
} elseif (array_key_exists ("Msg2FieldNameValueSubstitutionList", $_POST)) {
    $EditParmName1 = "Msg2FieldNameValueSubstitutionList";
} elseif (array_key_exists ("MsgEchoFieldNameValueSubstitutionList", $_POST)) {
    $EditParmName1 = "MsgEchoFieldNameValueSubstitutionList";
}

if (array_key_exists ("Msg1FieldNameValueSubstitutionList2", $_POST)) {
    $EditParmName2 = "Msg1FieldNameValueSubstitutionList2";
} elseif (array_key_exists ("Msg2FieldNameValueSubstitutionList2", $_POST)) {
    $EditParmName2 = "Msg2FieldNameValueSubstitutionList2";
} elseif (array_key_exists ("MsgEchoFieldNameValueSubstitutionList2", $_POST)) {
    $EditParmName2 = "MsgEchoFieldNameValueSubstitutionList2";
}

//  V2.1.0  if (!JSHEmpty($EditParmName1) and !JSHEmpty($EditParmName2)) {
//              WriteErrorMessage("C024");
//          }

if (!JSHEmpty($EditParmName1) and !JSHEmpty($EditParmName2)) {
    $EditParmValue1 = trim(stripslashes(strip_tags($_POST["$EditParmName1"])));
    $EditParmValue2 = trim(stripslashes(strip_tags($_POST["$EditParmName2"])));
    WriteErrorMessage("C021");
}

//-------------------------------------------------------------
//  End of Field Conflict Edit
//-------------------------------------------------------------


//-------------------------------------------------------------
//  CopyUser Edit
//
//  Handle $CopyUser / $FormEchoUser and set default
//-------------------------------------------------------------

//  Check to see if BOTH CopyUser AND ALSO FormEchoUser
//  are specified

if (array_key_exists ("CopyUser", $_POST) and array_key_exists ("FormEchoUser", $_POST)) {

    $EditParmName1    = "CopyUser";
    $EditParmValue1   = $CopyUser;
    $EditParmName2    = "FormEchoUser";
    $EditParmValue2   = $FormEchoUser;
    WriteErrorMessage("C003");
}

//  Set default values

If (JSHEmpty($FormEchoUser)) {
    if (JSHEmpty($CopyUser)) {
        $FormEchoUser = "yes";
    } else {
        NormalizeParmYN($CopyUser, "CopyUser", "yes", TRUE, $Ignore);
        $FormEchoUser = $CopyUser;
    }
} else {
    NormalizeParmYN($FormEchoUser, "FormEchoUser", "yes", TRUE, $Ignore);
}

//-------------------------------------------------------------
//  End of $CopyUser Edit
//-------------------------------------------------------------


//-------------------------------------------------------------
//  $FormCSVFileName Edit
//-------------------------------------------------------------

If ($FormCSVFileName == "*") {
    $EditParmName1 = "FormCSVFileName";
    WriteErrorMessage("C022");
}

//-------------------------------------------------------------
//  End of $FormCSVFileName Edit
//-------------------------------------------------------------


//-------------------------------------------------------------
//  $FormEmailField Edit and $FormEmailFieldList Edit
//
//  Create $FormEmail allowing for BOTH the old hidden field
//  named FormEmailField and its functional replacement
//  FormEmailFieldList
//-------------------------------------------------------------

//  Check to see if BOTH FormEmailField AND ALSO
//  FormEmailFieldList are specified

if (array_key_exists ("FormEmailField", $_POST) and
        array_key_exists ("FormEmailFieldList", $_POST)) {

    $EditParmName1   = "FormEmailField";
    $EditParmValue1  = $FormEmailField;
    $EditParmName2   = "FormEmailFieldList";
    $EditParmValue2  = $FormEmailFieldList;
    WriteErrorMessage("C003");
}

if ($FormEmailField == "*") {
    $EditParmName1 == "FormEmailField"; 
    WriteErrorMessage ("C022");
}

if ($FormEmailFieldList == "*") {
    $EditParmName1 == "FormEmailFieldList"; 
    WriteErrorMessage ("C022");
}

//  Set default values

if (JSHEmpty($FormEmailFieldList)) {
    $FormEmailFieldList = $FormEmailField;
    $OriginalFieldName = "FormEmailField";
} else {
    $OriginalFieldName = "FormEmailFieldList";
}

// Store original value for error reporting

$OriginalFormEmailFieldList = $FormEmailFieldList; 

//  Split $FormEmailFieldList into two parts:
//  the email field, and the confirmation field (maybe)

$FormEmailFieldListMod = str_replace("|", ",", $FormEmailFieldList);
list($FormEmailField, $FormEmailConfirmationField) = explode(",", $FormEmailFieldListMod); 

$FormEmailField             = trim($FormEmailField);
$FormEmailConfirmationField = trim($FormEmailConfirmationField);

//  See if the referenced fields were sent to the script


if (!JSHEmpty($FormEmailField)
        and !array_key_exists ($FormEmailField, $_POST)) {
    $EditParmName1  = $OriginalFieldName;
    $EditParmValue1 = $OriginalFormEmailFieldList;
    $EditFieldName1 = $FormEmailField;
    $EditFieldPos1  = 1;
    WriteErrorMessage("C001");
}

if (!JSHEmpty($FormEmailConfirmation) and
        !array_key_exists ($FormEmailConfirmation, $_POST)) {
    $EditParmName1  = $OriginalFieldName;
    $EditParmValue1 = $OriginalFormEmailFieldList;
    $EditFieldName1 = $FormEmailConfirmationField;
    $EditFieldPos1  = 2;
    WriteErrorMessage("C001");
}

$FormEmail              = trim(stripslashes(strip_tags($_POST[$FormEmailField])));
$FormEmailConfirmation  = trim(stripslashes(strip_tags($_POST[$FormEmailConfirmationField])));

//-------------------------------------------------------------
//  End of $FormEmailField Edit
//-------------------------------------------------------------


//-------------------------------------------------------------
//  $FormEmailFieldList Edit
//
//  See above at $FormEmailField
//-------------------------------------------------------------


//-------------------------------------------------------------
//  Begin $FormErrorPageErrorMsg Edit 
//-------------------------------------------------------------

$FormErrorPageLastFormatField = "";
$FormErrorPageCSSClassCount = 0;

$Temp1 = trim(stripslashes(strip_tags($_POST["FormErrorPageErrorMsg"])));

if ($Temp1 == "*") {
    $EditParmName1 == "FormErrorPageErrorMsg"; 
    WriteErrorMessage ("C022");
}

$Temp1Array = explode (",", $Temp1);

if (!JSHEmpty(trim($Temp1Array[0]))) {
//  error because first parameter is not allowed  
    $EditParmName1 = "FormErrorPageErrorMsg";
    $EditParmValue1 = $Temp1;
    $EditSubParmPos1 = 1;
    $EditSubParmValue1 = trim($Temp1Array[0]);
    WriteErrorMessage ("C036");
}

$Temp2 = $FormErrorPageErrorMsgFace;
if (!JSHEmpty(trim($Temp1Array[1]))) {
    $FormErrorPageLastFormatField = "FormErrorPageErrorMsg";
    $FormErrorPageErrorMsgFace  = trim($Temp1Array[1]) . ", " . $Temp2;
    $FormErrorPageErrorMsgFace  = str_replace("*", ",", $FormErrorPageErrorMsgFace);
}

if (!JSHEmpty(trim($Temp1Array[2]))) {
    $FormErrorPageLastFormatField = "FormErrorPageErrorMsg";
    $FormErrorPageErrorMsgSize  = trim($Temp1Array[2]);
    EditSubParmNumber ("FormErrorPageErrorMsg", $Temp1, $FormErrorPageErrorMsgSize, 3); 
}

if (!JSHEmpty(trim($Temp1Array[3]))) {
    $FormErrorPageLastFormatField = "FormErrorPageErrorMsg";
    $FormErrorPageErrorMsgColor = trim($Temp1Array[3]);
    EditSubParmColor ("FormErrorPageErrorMsg", $Temp1, $FormErrorPageErrorMsgColor, 4);
}

if (!JSHEmpty(trim($Temp1Array[4]))) {
//  error because fifth parameter is not allowed  
    $EditParmName1 = "FormErrorPageErrorMsg";
    $EditParmValue1 = $Temp1;
    $EditSubParmPos1 = 5;
    $EditSubParmValue1 = trim($Temp1Array[4]);
    WriteErrorMessage ("C036");
}

if (!JSHEmpty(trim($Temp1Array[5]))) {
    $FormErrorPageCSSClassCount = $FormErrorPageCSSClassCount + 1;
    $FormErrorPageLastCSSClassField = "FormErrorPageErrorMsg";
    $FormErrorPageErrorMsgClass  = trim($Temp1Array[5]);
}

//-------------------------------------------------------------
//  End of $FormErrorPageErrorMsg Edit 
//-------------------------------------------------------------


//-------------------------------------------------------------
//  Begin $FormErrorPageFooter Edit 
//-------------------------------------------------------------

$Temp1 = trim(stripslashes(strip_tags($_POST["FormErrorPageFooter"])));

if ($Temp1 == "*") {
    $EditParmName1 == "FormErrorPageFooter"; 
    WriteErrorMessage ("C022");
}

$Temp1Array = explode (",", $Temp1);

if (!JSHEmpty(trim($Temp1Array[0]))) {
//  error because first parameter is not allowed  
    $EditParmName1 = "FormErrorPageFooter";
    $EditParmValue1 = $Temp1;
    $EditSubParmPos1 = 1;
    $EditSubParmValue1 = trim($Temp1Array[0]);
    WriteErrorMessage ("C036");
}

$Temp2 = $FormErrorPageFooterFace;
if (!JSHEmpty(trim($Temp1Array[1]))) {
    $FormErrorPageLastFormatField = "FormErrorPageFooter";
    $FormErrorPageFooterFace  = trim($Temp1Array[1]) . ", " . $Temp2;
    $FormErrorPageFooterFace  = str_replace("*", ",", $FormErrorPageFooterFace);
}

if (!JSHEmpty(trim($Temp1Array[2]))) {
    $FormErrorPageLastFormatField = "FormErrorPageFooter";
    $FormErrorPageFooterSize  = trim($Temp1Array[2]);
    EditSubParmNumber ("FormErrorPageFooter", $Temp1, $FormErrorPageFooterSize, 3); 
}

if (!JSHEmpty(trim($Temp1Array[3]))) {
    $FormErrorPageLastFormatField = "FormErrorPageFooter";
    $FormErrorPageFooterColor = trim($Temp1Array[3]);
    EditSubParmColor ("FormErrorPageFooter", $Temp1, $FormErrorPageFooterColor, 4);
}

if (!JSHEmpty(trim($Temp1Array[4]))) {
//  error because fifth parameter is not allowed  
    $EditParmName1 = "FormErrorPageFormat";
    $EditParmValue1 = $Temp1;
    $EditSubParmPos1 = 5;
    $EditSubParmValue1 = trim($Temp1Array[4]);
    WriteErrorMessage ("C036");
}
if (!JSHEmpty(trim($Temp1Array[5]))) {
    $FormErrorPageCSSClassCount = $FormErrorPageCSSClassCount + 1;
    $FormErrorPageLastCSSClassField = "FormErrorPageFooter";
    $FormErrorPageFooterClass  = trim($Temp1Array[5]);
}

//-------------------------------------------------------------
//  End of $FormErrorPageFooter Edit 
//-------------------------------------------------------------


//-------------------------------------------------------------
//  Begin $FormErrorPageHeading1 Edit  
//-------------------------------------------------------------

$Temp1 = trim(stripslashes(strip_tags($_POST["FormErrorPageHeading1"])));

if ($Temp1 == "*") {
    $EditParmName1 == "FormErrorPageHeading1"; 
    WriteErrorMessage ("C022");
}

$Temp1Array = explode (",", $Temp1);

if (!JSHEmpty(trim($Temp1Array[0]))) {
    $FormErrorPageHeading1      = trim($Temp1Array[0]);
}    

$Temp2 = $FormErrorPageHeading1Face;
if (!JSHEmpty(trim($Temp1Array[1]))) {
    $FormErrorPageLastFormatField = "FormErrorPageHeading1";
    $FormErrorPageHeading1Face  = trim($Temp1Array[1]) . ", " . $Temp2;
    $FormErrorPageHeading1Face  = str_replace("*", ",", $FormErrorPageHeading1Face);
}

if (!JSHEmpty(trim($Temp1Array[2]))) {
    $FormErrorPageLastFormatField = "FormErrorPageHeading1";
    $FormErrorPageHeading1Size  = trim($Temp1Array[2]);
    EditSubParmNumber ("FormErrorPageHeading1", $Temp1, $FormErrorPageHeading1Size, 3); 
}

if (!JSHEmpty(trim($Temp1Array[3]))) {
    $FormErrorPageLastFormatField = "FormErrorPageHeading1";
    $FormErrorPageHeading1Color = trim($Temp1Array[3]);
    EditSubParmColor ("FormErrorPageHeading1", $Temp1, $FormErrorPageHeading1Color, 4);
}

if (!JSHEmpty(trim($Temp1Array[4]))) {
    $FormErrorPageLastFormatField = "FormErrorPageHeading1";
    $FormErrorPageHeading1Bold  = strtolower(trim($Temp1Array[4]));
    NormalizeSubParmYN("FormErrorPageHeading1", $Temp1, 5, $FormErrorPageHeading1Bold, "yes", TRUE, $Ignore); 
}    

if (!JSHEmpty(trim($Temp1Array[5]))) {
    $FormErrorPageCSSClassCount = $FormErrorPageCSSClassCount + 1;
    $FormErrorPageLastCSSClassField = "FormErrorPageHeading1";
    $FormErrorPageHeading1Class  = trim($Temp1Array[5]);
}

//-------------------------------------------------------------
//  End of $FormErrorPageHeading1 Edit
//-------------------------------------------------------------


//-------------------------------------------------------------
//  Begin $FormErrorPageHeading2 Edit
//-------------------------------------------------------------

$Temp1 = trim(stripslashes(strip_tags($_POST["FormErrorPageHeading2"])));

if ($Temp1 == "*") {
    $EditParmName1 == "FormErrorPageHeading2"; 
    WriteErrorMessage ("C022");
}

$Temp1Array = explode (",", $Temp1);

if (!JSHEmpty(trim($Temp1Array[0]))) {
    $FormErrorPageHeading2      = trim($Temp1Array[0]);
}    

$Temp2 = $FormErrorPageHeading2Face;
if (!JSHEmpty(trim($Temp1Array[1]))) {
    $FormErrorPageLastFormatField = "FormErrorPageHeading2";
    $FormErrorPageHeading2Face  = trim($Temp1Array[1]) . ", " . $Temp2;
    $FormErrorPageHeading2Face  = str_replace("*", ",", $FormErrorPageHeading2Face);
}

if (!JSHEmpty(trim($Temp1Array[2]))) {
    $FormErrorPageLastFormatField = "FormErrorPageHeading2";
    $FormErrorPageHeading2Size  = trim($Temp1Array[2]);
    EditSubParmNumber ("FormErrorPageHeading2", $Temp1, $FormErrorPageHeading2Size, 3); 
}

if (!JSHEmpty(trim($Temp1Array[3]))) {
    $FormErrorPageLastFormatField = "FormErrorPageHeading2";
    $FormErrorPageHeading2Color = trim($Temp1Array[3]);
    EditSubParmColor ("FormErrorPageHeading2", $Temp1, $FormErrorPageHeading2Color, 4);
}

if (!JSHEmpty(trim($Temp1Array[4]))) {
    $FormErrorPageLastFormatField = "FormErrorPageHeading2";
    $FormErrorPageHeading2Bold  = strtolower(trim($Temp1Array[4]));
    NormalizeSubParmYN("FormErrorPageHeading2", $Temp1, 5, $FormErrorPageHeading2Bold, "yes", TRUE, $Ignore); 
}    

if (!JSHEmpty(trim($Temp1Array[5]))) {
    $FormErrorPageCSSClassCount = $FormErrorPageCSSClassCount + 1;
    $FormErrorPageLastCSSClassField = "FormErrorPageHeading2";
    $FormErrorPageHeading2Class  = trim($Temp1Array[5]);
}

//-------------------------------------------------------------
//  End of $FormErrorPageHeading2 Edit
//-------------------------------------------------------------


//-------------------------------------------------------------
//  Begin $FormErrorPageLinEClosing Edit 
//-------------------------------------------------------------

$Temp1 = trim(stripslashes(strip_tags($_POST["FormErrorPageLinEClosing"])));

if ($Temp1 == "*") {
    $EditParmName1 == "FormErrorPageLinEClosing"; 
    WriteErrorMessage ("C022");
}

$Temp1Array = explode (",", $Temp1);

if (!JSHEmpty(trim($Temp1Array[0]))) {
    $FormErrorPageLinEClosing      = trim($Temp1Array[0]);
}

$Temp2 = $FormErrorPageLinEClosingFace;
if (!JSHEmpty(trim($Temp1Array[1]))) {
    $FormErrorPageLastFormatField = "FormErrorPageLinEClosing";
    $FormErrorPageLinEClosingFace  = trim($Temp1Array[1]) . ", " . $Temp2;
    $FormErrorPageLinEClosingFace  = str_replace("*", ",", $FormErrorPageLinEClosingFace);
}

if (!JSHEmpty(trim($Temp1Array[2]))) {
    $FormErrorPageLastFormatField = "FormErrorPageLinEClosing";
    $FormErrorPageLinEClosingSize  = trim($Temp1Array[2]);
    EditSubParmNumber ("FormErrorPageLinEClosing", $Temp1, $FormErrorPageLinEClosingSize, 3); 
}

if (!JSHEmpty(trim($Temp1Array[3]))) {
    $FormErrorPageLastFormatField = "FormErrorPageLinEClosing";
    $FormErrorPageLinEClosingColor = trim($Temp1Array[3]);
    EditSubParmColor ("FormErrorPageLinEClosing", $Temp1, $FormErrorPageLinEClosingColor, 4);
}

if (!JSHEmpty(trim($Temp1Array[4]))) {
    $FormErrorPageLastFormatField = "FormErrorPageLinEClosing";
    $FormErrorPageLinEClosingBold  = strtolower(trim($Temp1Array[4]));
    NormalizeSubParmYN("FormErrorPageLinEClosing", $Temp1, 5, $FormErrorPageLinEClosingBold, "yes", TRUE, $Ignore); 
}    

if (!JSHEmpty(trim($Temp1Array[5]))) {
    $FormErrorPageCSSClassCount = $FormErrorPageCSSClassCount + 1;
    $FormErrorPageLastCSSClassField = "FormErrorPageLinEClosing";
    $FormErrorPageLinEClosingClass  = trim($Temp1Array[5]);
}

//-------------------------------------------------------------
//  End of $FormErrorPageLinEClosing Edit
//-------------------------------------------------------------


//-------------------------------------------------------------
//  Begin $FormErrorPageLineOpening Edit 
//-------------------------------------------------------------

$Temp1 = trim(stripslashes(strip_tags($_POST["FormErrorPageLineOpening"])));

if ($Temp1 == "*") {
    $EditParmName1 == "FormErrorPageLineOpening"; 
    WriteErrorMessage ("C022");
}

$Temp1Array = explode (",", $Temp1);

if (!JSHEmpty(trim($Temp1Array[0]))) {
    $FormErrorPageLineOpening      = trim($Temp1Array[0]);
}    

$Temp2 = $FormErrorPageLineOpeningFace;
if (!JSHEmpty(trim($Temp1Array[1]))) {
    $FormErrorPageLastFormatField = "FormErrorPageLineOpening";
    $FormErrorPageLineOpeningFace  = trim($Temp1Array[1]) . ", " . $Temp2;
    $FormErrorPageLineOpeningFace  = str_replace("*", ",", $FormErrorPageLineOpeningFace);
}

if (!JSHEmpty(trim($Temp1Array[2]))) {
    $FormErrorPageLastFormatField = "FormErrorPageLineOpening";
    $FormErrorPageLineOpeningSize  = trim($Temp1Array[2]);
    EditSubParmNumber ("FormErrorPageLineOpening", $Temp1, $FormErrorPageLineOpeningSize, 3); 
}

if (!JSHEmpty(trim($Temp1Array[3]))) {
    $FormErrorPageLastFormatField = "FormErrorPageLineOpening";
    $FormErrorPageLineOpeningColor = trim($Temp1Array[3]);
    EditSubParmColor ("FormErrorPageLineOpening", $Temp1, $FormErrorPageLineOpeningColor, 4);
}

if (!JSHEmpty(trim($Temp1Array[4]))) {
    $FormErrorPageLastFormatField = "FormErrorPageLineOpening";
    $FormErrorPageLineOpeningBold  = strtolower(trim($Temp1Array[4]));
    NormalizeSubParmYN("FormErrorPageLineOpening", $Temp1, 5, $FormErrorPageLineOpeningBold, "yes", TRUE, $Ignore); 
}    

if (!JSHEmpty(trim($Temp1Array[5]))) {
    $FormErrorPageCSSClassCount = $FormErrorPageCSSClassCount + 1;
    $FormErrorPageLastCSSClassField = "FormErrorPageLineOpening";
    $FormErrorPageLineOpeningClass  = trim($Temp1Array[5]);
}

//-------------------------------------------------------------
//  End of $FormErrorPageLineOpening Edit
//-------------------------------------------------------------


//-------------------------------------------------------------
//  Begin Comparison Edit of CSS Classes and other Formatting 
//-------------------------------------------------------------

if ($FormErrorPageCSSClassCount == 0) {
    $A = "a";
} else {
    if (JSHEmpty($FormErrorPageLastFormatField)) {
        if ($FormErrorPageCSSClassCount == 6) {
            $A = "a";
        } else {    
            if (JSHEmpty($FormErrorPageErrorMsgClass)) {
                $EditParmName1  = "FormErrorPageErrorMsg"; 
            } elseif (JSHEmpty($FormErrorPageFooterClass)) {
                $EditParmName1  = "FormErrorPageFooter"; 
            } elseif (JSHEmpty($FormErrorPageHeading1Class)) {
                $EditParmName1  = "FormErrorPageHeading1"; 
            } elseif (JSHEmpty($FormErrorPageHeading2Class)) {
                $EditParmName1  = "FormErrorPageHeading2"; 
            } elseif (JSHEmpty($FormErrorPageLinEClosingClass)) {
                $EditParmName1  = "FormErrorPageLinEClosing"; 
            } elseif (JSHEmpty($FormErrorPageLineOpeningClass)) {
                $EditParmName1  = "FormErrorPageLineOpening"; 
            }    
            $EditParmValue1 = trim(stripslashes(strip_tags($_POST[$EditParmName1])));
            WriteErrorMessage ("C034"); 
        }    
    } else {
        $EditParmName1  = $FormErrorPageLastCSSClassField;
        $EditParmValue1 = trim(stripslashes(strip_tags($_POST[$EditParmName1])));
        $EditParmName2  = $FormErrorPageLastFormatField;
        $EditParmValue2 = trim(stripslashes(strip_tags($_POST[$EditParmName2])));
        WriteErrorMessage ("C035");
    }
}    


//-------------------------------------------------------------
//  End Comparison Edit of CSS Classes and other Formatting 
//-------------------------------------------------------------


//-------------------------------------------------------------
//  Begin $FormErrorPageTitle Edit 
//-------------------------------------------------------------

if ($FormErrorPageTitle == "*") {
    $EditParmName1 == "FormErrorPageTitle"; 
    WriteErrorMessage ("C022");
}

//-------------------------------------------------------------
//  End of $FormErrorPageTitle Edit
//-------------------------------------------------------------


//-------------------------------------------------------------
//  $FormErrorPageTrackingInfo Edit 
//
//  Check and Normalize FormErrorPageTrackingInfo
//-------------------------------------------------------------

NormalizeParmYN($FormErrorPageTrackingInfo, "FormErrorPageTrackingInfo", "yes", TRUE, $Ignore);

//-------------------------------------------------------------
//  End of $FormErrorPageTrackingInfo Edit
//-------------------------------------------------------------


//-------------------------------------------------------------
//  $FormFieldNameEditList Edit
//
//  Parameter Error Checking
//-------------------------------------------------------------

if ($FormFieldNameEditList == "*") {
    $EditParmName1 == "FormFieldNameEditList"; 
    WriteErrorMessage ("C022");
}

if (!JSHEmpty($FormFieldNameEditList)) {

    $FormFieldNameEditListMod = str_replace("|", ",", $FormFieldNameEditList);

    $FormFieldNameEditListArray = explode (",", $FormFieldNameEditListMod);

    $EditParmName1  = "FormFieldNameEditList";
    $EditParmValue1 = $FormFieldNameEditList;

    $Key = 0;
    $KeyStop = count ($FormFieldNameEditListArray);
    $ExpectingAFieldName = TRUE;
    $EditParmName1 = "FormFieldNameEditList";

    if (trim($FormFieldNameEditListArray[$KeyStop-1]) != "~") {
            WriteErrorMessage("C012");
    }

    while ($Key < $KeyStop) {

        if (!$ExpectingAFieldName) {

            $EditSubParmValue4 = trim($FormFieldNameEditListArray[$Key]);

            if ($EditSubParmValue4 != "~") {
                $EditSubParmPos4 = $Key + 1;
                WriteErrorMessage("C013");
            }

            $ExpectingAFieldName = TRUE;
            $Key = $Key + 1;

        } else {

            $ExpectingAFieldName = FALSE;

            $EditFieldName1 = trim($FormFieldNameEditListArray[$Key]);

            $Key = $Key + 1;
            $EditFieldPos1 = $Key;

            $Error = "";
            if (!array_key_exists ($EditFieldName1, $_POST)) {
                $Error = "C001";
            }

            $EditFieldLabel1 = trim($FormFieldNameLabelArray[$EditFieldName1]);
            $EditFieldValue1 = trim(stripslashes(strip_tags($_POST[$EditFieldName1])));

            $EditEditValue1 = strtolower(trim($FormFieldNameEditListArray[$Key]));
            $Key = $Key + 1;
            $EditEditPos1 = $Key;

            if ($Error <> "" and $EditEditValue1 != "checkboxgroup") {
                     WriteErrorMessage("$Error");
            }

            if (!in_array ($EditEditValue1, $ValidFieldEditsArray)) {
                WriteErrorMessage("C006");
            }


//      Begin to process the specific edits


//          Edit: Checkbox Group

            if ($EditEditValue1 == "checkboxgroup") {

                $MinNumberSpecified = trim($FormFieldNameEditListArray[$Key]);
                $Key = $Key + 1;
                $ErrorFound = EditInteger($MinNumberSpecified, $EditCharValue1, $EditCharFormatted1, $EditCharPos1);

                if ($ErrorFound) {
                    $EditSubParmName1   = "Minimum Number of Boxes Checked";
                    $EditSubParmValue1  = $NumberSpecified;
                    WriteErrorMessage("C017");
                }

                $MaxNumberSpecified = trim($FormFieldNameEditListArray[$Key]);
                $Key = $Key + 1;
                $ErrorFound = EditInteger($NumberSpecified, $EditCharValue1, $EditCharFormatted1, $EditCharPos1);

                if ($ErrorFound) {
                    $EditSubParmName1   = "Maximum Number of Boxes Checked";
                    $EditSubParmValue1  = $NumberSpecified;
                    WriteErrorMessage("C017");
                }

                while ($Key < $KeyStop and
                        trim($FormFieldNameEditListArray[$Key]) <> "~") {
                    $Key = $Key + 1;
                }


//          Edit: Drop Down

//          no configuration edits necessary for Drop Down

            } elseif ($EditEditValue1 == "dropdown" or $EditEditValue1 == "drop down" or $EditEditValue1 == "pulldown" or $EditEditValue1 == "pull down") {
                $Key = $Key + 1;


//          Edit: Compare

            } elseif ($EditEditValue1 == "compare") {

                $EditFieldName2 = trim($FormFieldNameEditListArray[$Key]);
                $Key = $Key + 1;

                if (!array_key_exists ($EditFieldName2, $_POST)) {
                    $EditFieldName1 = $EditFieldName2;
                    $EditFieldPos1  = $Key;
                    WriteErrorMessage("C001");
                }


    //      Edit: Email 

            } elseif ($EditEditValue1 == "email") {

                $EditFieldName2 = trim($FormFieldNameEditListArray[$Key]);

                if ($EditFieldName2 != "~") {
                    $Key = $Key + 1;
                    
                    if (!array_key_exists ($EditFieldName2, $_POST)) {
                        $EditFieldName1 = $EditFieldName2;
                        $EditFieldPos1  = $Key;
                        WriteErrorMessage("C001");
                    }
                }    


    //      Edit: Captcha

//          no configuration edits needed for captcha

            } elseif ($EditEditValue1 == "captcha") {

                $Key = $Key + 1;


//          Edit: Attraction

//          no configuration edits needed for captcha

            } elseif ($EditEditValue1 == "attraction") {

                $A = "A";


//          Edit: Equal

            } elseif ($EditEditValue1 == "equal" or $EditEditValue1 == "equals") {

                $CheckValue = trim($FormFieldNameEditListArray[$Key]);

                while ($CheckValue != "~") {

                    $Key = $Key + 1;
                    $CheckValue = trim($FormFieldNameEditListArray[$Key]);

                }


//          Edit: Not Equal

            } elseif ($EditEditValue1 == "not equal" or $EditEditValue1 == "notequal") {

                $CheckValue = strtolower(trim($FormFieldNameEditListArray[$Key]));

                while ($CheckValue != "~") {

                    $Key = $Key + 1;
                    $CheckValue = trim($FormFieldNameEditListArray[$Key]);
                }


//          Edit: Integer

            } elseif ($EditEditValue1 == "integer") {

                $Key = $Key + 2;


//          Edit: Number

            } elseif ($EditEditValue1 == "number") {

                $Key = $Key + 2;


//          Edit: Text

            } elseif ($EditEditValue1 == "text") {

                $EditSubParmValue1 = strtolower(trim($FormFieldNameEditListArray[$Key]));
                $Key = $Key + 1;

                while ($EditSubParmValue1 != "~") {

                    if ($EditSubParmValue1 == "letters" or $EditSubParmValue1 == "letter") {
                        $A = "A";

                    } elseif ($EditSubParmValue1 == "numbers" or $EditSubParmValue1 == "number") {
                        $A = "A";

                    } elseif ($EditSubParmValue1 == "spaces" or $EditSubParmValue1 == "space") {
                        $A = "A";

                    } elseif (substr($EditSubParmValue1, 0, 6) == "other:") {
                        $A = "A";

                    } else {
                        $EditSubParmPos1 = $Key;
                        WriteErrorMessage("C014");

                    }

                    $EditSubParmValue1 = strtolower(trim($FormFieldNameEditListArray[$Key]));
                    $Key = $Key + 1;

                }

                $Key = $Key - 1;

            } else {
                $Key = $Key + 1;
            }
        }
    }
}

//------------------------------------------------------------- 
//  End of $FormFieldNameEditList Edit
//-------------------------------------------------------------


//-------------------------------------------------------------
//  $FormNameFieldList Edit
//
//  Create $FormName allowing for the old hidden field named $FormNamEField
//  and its functional replacement $FormNameFieldList
//-------------------------------------------------------------

if (array_key_exists ("FormNamEField", $_POST) and array_key_exists ("FormNameFieldList", $_POST)) {

    $EditParmName1    = "FormNamEField";
    $EditParmValue1   = $FormNamEField;
    $EditParmName2    = "FormNameFieldList";
    $EditParmValue2   = $FormNameFieldList;
    WriteErrorMessage("C003");
}

if ($FormNamEField == "*") {
    $EditParmName1 == "FormNamEField"; 
    WriteErrorMessage ("C022");
}

if ($FormNameFieldList == "*") {
    $EditParmName1 == "FormNameFieldList"; 
    WriteErrorMessage ("C022");
}


if (JSHEmpty($FormNameFieldList)) {
    $OriginalFieldName = "FormNamEField";
    $FormNameFieldList = $FormNamEField;
} else {
    $OriginalFieldName = "FormNameFieldList";
}

$FormName = "";

if (!JSHEmpty($FormNameFieldList)) {

    $FormNameFieldListMod = str_replace("|", ",", $FormNameFieldList);
    $FormNameFieldListArray = explode (",", $FormNameFieldListMod);

    foreach ($FormNameFieldListArray as $VarNum => $EditFieldName1) {

        $EditFieldName1 = trim($EditFieldName1);

        if (!array_key_exists ($EditFieldName1, $_POST) and 
                    $EditFieldName1 != "scriptversion" and
                    $EditFieldName1 != "phpversion" and
                    $EditFieldName1 != "scriptstarttime" and
                    $EditFieldName1 != "scriptpathshort" and
                    $EditFieldName1 != "scriptpathlong" and
                    $EditFieldName1 != "ip" and
                    $EditFieldName1 != "browser" and
                    $EditFieldName1 != "referer" and
                    $EditFieldName1 != "referrer") 
                    {
            $EditParmName1  = $OriginalFieldName;
//          $EditFieldName1 = ;
            $EditFieldPos1  = $VarNum + 1;
            $EditParmValue1 = $FormNameFieldList;
            WriteErrorMessage("C001");
        }

        $FormName = $FormName . " " . trim(stripslashes(strip_tags($_POST[$EditFieldName1]))); 
    }
}

$FormName = trim($FormName);

//------------------------------------------------------------- 
//  End of $FormNameFieldList Edit
//-------------------------------------------------------------


//-------------------------------------------------------------
//  $FormFieldNameLabelPlusList Edit
//
//  Done by ProcessFormFieldNameLabelPlusList()
//  Called in Main Code
//-------------------------------------------------------------


//-------------------------------------------------------------
//  $FormNamEField
//
//  See $FormNameFieldList above
//-------------------------------------------------------------


//-------------------------------------------------------------
//  $FormNextURL Edit
//
//  Process with $NextURL (deprecated) and set default
//-------------------------------------------------------------

if (array_key_exists ("NextURL", $_POST) and array_key_exists ("FormNextURL", $_POST)) {

    $EditParmName1    = "NextURL";
    $EditParmValue1   = $NextURL;
    $EditParmName2    = "FormNextURL";
    $EditParmValue2   = $FormNextURL;
    WriteErrorMessage("C003");
}

if ($NextURL == "*") {
    $EditParmName1 == "NextURL"; 
    WriteErrorMessage ("C022");
}

if ($FormNextURL == "*") {
    $EditParmName1 == "FormNextURL"; 
    WriteErrorMessage ("C022");
}

if (JSHEmpty($FormNextURL)) {
    if (JSHEmpty($NextURL)) {
        $FormNextURL = "http://www.jamesshuggins.com/h/hefs/huggins-email-form-script-thank-you.htm";
    } else {
        $FormNextURL = $NextURL;
    }
}

//-------------------------------------------------------------
//  End of $FormNextURL Edit
//-------------------------------------------------------------


//-------------------------------------------------------------
//  $FormOutputFieldInfo Edit
//
//  Processed within Main Code before these edits start
//-------------------------------------------------------------


//-------------------------------------------------------------
//  $FormPleaseForgiveMyUseOfAWindowsServer Edit
//
//  Normalized Yes/No
//-------------------------------------------------------------

NormalizeParmYN($FormPleaseForgiveMyUseOfAWindowsServer, "FormPleaseForgiveMyUseOfAWindowsServer", "no", TRUE, $Ignore);

//-------------------------------------------------------------
//  End of $FormPleaseForgiveMyUseOfAWindowsServer Edit
//-------------------------------------------------------------


//-------------------------------------------------------------
//  $FormTestEmailDomain Edit
//
//  Normalized Yes/No
//-------------------------------------------------------------

NormalizeParmYN($FormTestEmailDomain, "FormTestEmailDomain", "yes", TRUE, $Ignore);

//-------------------------------------------------------------
//  End of $FormTestEmailDomain Edit
//-------------------------------------------------------------


//-------------------------------------------------------------
//  $FormTestEmailFormat Edit
//
//  Normalized Yes/No
//-------------------------------------------------------------

NormalizeParmYN($FormTestEmailFormat, "FormTestEmailFormat", "yes", TRUE, $Ignore);

//-------------------------------------------------------------
//  End of $FormTestEmailFormat Edit
//-------------------------------------------------------------


//-------------------------------------------------------------
//  $FormTestFieldMinLengths Edit
//
//  Normalized Yes/No
//-------------------------------------------------------------

NormalizeParmYN($FormTestFieldMinLengths, "FormTestFieldMinLengths", "yes", TRUE, $Ignore);

//-------------------------------------------------------------
//  End of $FormTestFieldMinLengths Edit
//-------------------------------------------------------------


//-------------------------------------------------------------
//  $FormTestFieldMaxLengths Edit
//
//  Normalized Yes/No
//-------------------------------------------------------------

NormalizeParmYN($FormTestFieldMaxLengths, "FormTestFieldMaxLengths", "yes", TRUE, $Ignore);

//-------------------------------------------------------------
//  End of $FormTestFieldMaxLengths Edit
//-------------------------------------------------------------


//-------------------------------------------------------------
//  $FormTestInjectionExploits Edit
//
//  Normalized Yes/No
//-------------------------------------------------------------

NormalizeParmYN($FormTestInjectionExploits, "FormTestInjectionExploits", "yes", TRUE, $Ignore);

//-------------------------------------------------------------
//  End of $FormTestInjectionExploits Edit
//-------------------------------------------------------------


//-------------------------------------------------------------
//  $NextUrl Edit
//
//  Done above with FormNextURL
//-------------------------------------------------------------


}  //  End of EditFormLevelParameters ()




//*************************************************************
//  FUNCTION: EditMessageLevelParameters ()
//*************************************************************

function EditMessageLevelParameters () {

global 
    $at,
    $Browser,

    $CopyUser,

    $CRLF,

    $EditCharFormatted1,
    $EditCharPos1,
    $EditCharValue1,
    $EditEditValue1,   
    $EditEditPos1,    
    $EditFieldActualSize1,
    $EditFieldActualSize2,
    $EditFieldLabel1,
    $EditFieldLabel2,
    $EditFieldMaxSize1,
    $EditFieldMaxSize2,
    $EditFieldMinSize1,
    $EditFieldMinSize2,
    $EditFieldName1,    
    $EditFieldName2, 
    $EditFieldPos1,    
    $EditFieldPos2,    
    $EditFieldValue1,    
    $EditFieldValue2, 
    $EditLowValue,
    $EditHighValue,
    $EditParmName1,    
    $EditParmName2,
    $EditParmValue1,    
    $EditParmValue2,
    $EditParmValue3,
    $EditSubParmLabel1,
    $EditSubParm1LegalValues,
    $EditSubParmName1,
    $EditSubParmNum1,
    $EditSubParmNum2,
    $EditSubParmPos1,  
    $EditSubParmPos2,
    $EditSubParmPos3,
    $EditSubParmPos4,
    $EditSubParmValue1,    
    $EditSubParmValue2,
    $EditSubParmValue3,
    $EditSubParmValue4,
    $EditTestValue,

    $ErrorMessagEC,
    $ErrorMessageSpam,
    $ErrorNumber,
    $ErrorPrefix,
    $ErrorSequenceNumber,
    $ErrorSuffix,
    $ErrorsWritten,

    $FormCSVFileName,
    $FormEchoUser,
    $FormEmail,
    $FormEmailConfirmation,
    $FormEmailConfirmationField,
    $FormEmailConfirmationFieldLabel,
    $FormEmailField,
    $FormEmailFieldLabel,
    $FormEmailFieldList,

    $FormErrorPageCSSClassCount,
    $FormErrorPageErrorMsgClass,
    $FormErrorPageErrorMsgColor,
    $FormErrorPageErrorMsgFace,
    $FormErrorPageErrorMsgSize,
    $FormErrorPageFooterClass,
    $FormErrorPageFooterColor,
    $FormErrorPageFooterFace,
    $FormErrorPageFooterSize,
    $FormErrorPageHeading1,
    $FormErrorPageHeading1Bold,
    $FormErrorPageHeading1Class,
    $FormErrorPageHeading1Color,
    $FormErrorPageHeading1Face,
    $FormErrorPageHeading1Size,
    $FormErrorPageHeading2,
    $FormErrorPageHeading2Bold,
    $FormErrorPageHeading2Class,
    $FormErrorPageHeading2Color,
    $FormErrorPageHeading2Face,
    $FormErrorPageHeading2Size,
    $FormErrorPageLastCSSClassField,
    $FormErrorPageLastFormatField,
    $FormErrorPageLinEClosing,
    $FormErrorPageLinEClosingBold,
    $FormErrorPageLinEClosingClass,
    $FormErrorPageLinEClosingColor,
    $FormErrorPageLinEClosingFace,
    $FormErrorPageLinEClosingSize,
    $FormErrorPageLineOpening,
    $FormErrorPageLineOpeningBold,
    $FormErrorPageLineOpeningClass,
    $FormErrorPageLineOpeningColor,
    $FormErrorPageLineOpeningFace,    
    $FormErrorPageLineOpeningSize,
    $FormErrorPageTemplate,    
    $FormErrorPageTemplateContents,
    $FormErrorPageTitle,
    $FormErrorPageTrackingInfo,

    $FormFieldNameEditList,
    $FormFieldNameEditListArray,
    $FormFieldNameExcludEArray,
    $FormFieldNameLabelArray,
    $FormFieldNameLabelListArray,
    $FormFieldNameLabelPlusList,
    $FormFieldNameLabelPlusListArray,
    $FormFieldNameMinSizEArray,
    $FormFieldNameMaxSizEArray,
    $FormFieldNameRequiredArray,
    $FormName,
    $FormNamEField,
    $FormNameFieldList,
    $FormNextURL,
    $FormOutputFieldInfo,
    $FormPleaseForgiveMyUseOfAWindowsServer,
    $FormTestEmailDomain,
    $FormTestEmailFormat,
    $FormTestFieldMinLengths,
    $FormTestFieldMaxLengths,
    $FormTestInjectionExploits,

    $HoldMsg1AddrList,
    $HoldMsg1Subject,

    $HoldMsg2AddrList,
    $HoldMsg2Subject,

    $IP,
    $Message, 

    $Msg0AddrList,
    $Msg0DefaultFromAddr,
    $Msg0FieldLabelValueSeparator, 
    $Msg0FieldNameExcludEArray,
    $Msg0FieldNameExcludeListArray,
    $Msg0FieldNameLabelList,
    $Msg0FieldNameLabelListArray,
    $Msg0FieldNameLabelListArrayDefault,
    $Msg0FieldNameValueSubstitutionArray,
    $Msg0FieldNameValueSubstitutionList,
    $Msg0FieldValueTerminator,
    $Msg0ForcEDefaultFromAddr,
    $Msg0Subject,
    $Msg0TextBottom,
    $Msg0TextTop,

    $Msg1LabelSubjectAndAddressesDropDown,
    $Msg1AddrList,
    $Msg1AddrListAndSubjectSetByDropDown,
    $Msg1DefaultFromAddr,
    $Msg1FieldLabelValueSeparator,
    $Msg1FieldNameExcludeList,
    $Msg1FieldNameExcludeListArray,
    $Msg1FieldNameLabelList,
    $Msg1FieldNameLabelListArray,
    $Msg1FieldNameValueSubstitutionArray,
    $Msg1FieldNameValueSubstitutionList,
    $Msg1FieldNameValueSubstitutionList2,
    $Msg1ForcEDefaultFromAddr,
    $Msg1Subject,
    $Msg1SubjectField,
    $Msg1TextBottom,
    $Msg1TextTop,

    $Msg2LabelSubjectAndAddressesDropDown,
    $Msg2AddrList,
    $Msg2AddrListAndSubjectSetByDropDown,
    $Msg2DefaultFromAddr,
    $Msg2FieldLabelValueSeparator,
    $Msg2FieldNameExcludeList,
    $Msg2FieldNameExcludeListArray,
    $Msg2FieldNameLabelList,
    $Msg2FieldNameLabelListArray,
    $Msg2FieldNameValueSubstitutionArray,
    $Msg2FieldNameValueSubstitutionList,
    $Msg2FieldNameValueSubstitutionList2,
    $Msg2ForcEDefaultFromAddr,
    $Msg2Subject,
    $Msg2SubjectField,
    $Msg2TextBottom,
    $Msg2TextTop,

    $MsgEchoAddressee,
    $MsgEchoFromAddr,
    $MsgEchoFieldLabelValueSeparator,
    $MsgEchoFieldNameExcludeList,
    $MsgEchoFieldNameExcludeListArray,
    $MsgEchoFieldNameLabelList,
    $MsgEchoFieldNameLabelListArray,
    $MsgEchoFieldNameValueSubstitutionArray,
    $MsgEchoFieldNameValueSubstitutionList,
    $MsgEchoFieldNameValueSubstitutionLists,
    $MsgEchoSubject,
    $MsgEchoTextBottom,
    $MsgEchoTextTop,

    $MsgNumber,

    $NextURL,
    $PHPVersion,
    $Referer,
    $ProcessFormFieldNameLabelPlusListDone,
    $ScriptPathShort,
    $ScriptPathLong,
    $ScriptStartTime,    
    $ScriptVersion,
    $TemplateErrorPlacementString,
    $ValidFieldEditsArray;

//-------------------------------------------------------------
//  Begin MsgxLabelSubjectAndAddressesDropDown Edit
//-------------------------------------------------------------

$Msg1AddrListAndSubjectSetByDropDown = FALSE;
$Msg2AddrListAndSubjectSetByDropDown = FALSE;

$X = 1;
while ($X < 3) {
    if ($X == 1) {
        $EditParmName1  = "Msg1LabelSubjectAndAddressesDropDown";
        $EditParmName2  = "Msg1AddrList";
        $EditParmName3  = "Msg1Subject";
    } elseif ($X == 2) {
        $EditParmName1  = "Msg2LabelSubjectAndAddressesDropDown";
        $EditParmName2  = "Msg2AddrList";
        $EditParmName3  = "Msg2Subject";
    }

    $EditParmValue1  = trim(stripslashes(strip_tags($_POST[$EditParmName1])));

    if ($EditParmValue1 == "*") {
        WriteErrorMessage ("C022");
    }

    if (array_key_exists ($EditParmName1, $_POST) and array_key_exists ($EditParmName2, $_POST)) {
        $EditParmValue2  = trim(stripslashes(strip_tags($_POST[$EditParmName2])));
        WriteErrorMessage(C021);
    } elseif (array_key_exists ($EditParmName1, $_POST) and array_key_exists ($EditParmName3, $_POST)) {
        $EditParmValue3  = trim(stripslashes(strip_tags($_POST[$EditParmName3])));
        $EditParmName2   = $EditParmName3;
        $EditParmValue2  = $EditParmValue3;
        WriteErrorMessage(C021);
    }

    if (!JSHEmpty($EditParmValue1)) {
        $EditParmValue1Mod = str_replace("|", ",", $EditParmValue1);
        $EditParmValue1Array = explode (",", $EditParmValue1Mod);

        $Count = count($EditParmValue1Array); 

        if ($Count == 1) {
            WriteErrorMessage("E025");
        } else {

            $Factor = 3;
            $Remainder = ($Count - 2) % $Factor;

            if ($Remainder != 0) {
                $EditSubParmValue1  = $Count; 
                $EditSubParmValue2  = $Factor; 
                $EditSubParmValue3  = 2;
                WriteErrorMessage("C020");
            }

            $Pos = strpos($EditParmValue1Mod, ",");
            $Pos = strpos($EditParmValue1Mod, ",", $Pos+1);

            if ($X == 1) {      
                $HoldMsg1Subject = trim($EditParmValue1Array[1]);
                $HoldMsg1AddrList = substr($EditParmValue1Mod, $Pos+1);
                $Msg1LabelSubjectAndAddressesDropDown = trim($EditParmValue1Array[0]);
                $Msg1AddrListAndSubjectSetByDropDown = TRUE;

            } elseif ($X == 2) {
                $HoldMsg2Subject = trim($EditParmValue1Array[1]);
                $HoldMsg2AddrList = substr($EditParmValue1Mod, $Pos+1);
                $Msg2LabelSubjectAndAddressesDropDown = trim($EditParmValue1Array[0]);
                $Msg2AddrListAndSubjectSetByDropDown = TRUE;
            }

            $Key0 = 3;
    
            while ($Key0 < $Count) {
     
                $Key2 = $Key0;
                $Key3 = $Key2 + 1;
                $EmailTest = trim($EditParmValue1Array[$Key2]) . "@" . trim($EditParmValue1Array[$Key3]);

                EditEmailAddress($EmailTest, $EditParmName1, $Key2, "C");
    
                $Key0 = $Key0 + 3;
            }

        }
    }

    $X = $X + 1;
}

//-------------------------------------------------------------
//  End of $MsgxLabelSubjectAndAddressesDropDown Edit
//-------------------------------------------------------------


//-------------------------------------------------------------
//  Begin MsgEchoFromAddr Edit
//-------------------------------------------------------------

$EditParmName1   = "MsgEchoFromAddr";
$EditParmValue1  = $MsgEchoFromAddr; 

if ($EditParmValue1 == "*") {
    WriteErrorMessage ("C022");
}


if (!JSHEmpty($EditParmValue1)) {

    $EditParmValue1Mod    = str_replace("|", ",", $EditParmValue1);
    $EditParmValue1Array  = explode (",", $EditParmValue1Mod);

    $Count = count($EditParmValue1Array); 

    if ($Count != 3) {
        $EditSubParmValue1  = $Count; 
        $EditSubParmValue2  = 3; 
        WriteErrorMessage("C015");
    }

    $EmailTest = trim($EditParmValue1Array[1]) . "@" . trim($EditParmValue1Array[2]);

    EditEmailAddress($EmailTest, $EditParmName1, 1, "C");
}

//-------------------------------------------------------------
//  End of $MsgEchoFromAddr Edit
//-------------------------------------------------------------


//-------------------------------------------------------------
//  Begin MsgxAddrList Edit
//-------------------------------------------------------------

$X = 1; 
while ($X < 3) {
    if ($X == 1) {
        if ($Msg1AddrListAndSubjectSetByDropDown) {
            $EditParmName1  = "BoogieWoogiePizzaBoy19";
            $EditParmValue1 = "";
        } else {
            $EditParmName1   = "Msg1AddrList";
            $EditParmValue1  = $Msg1AddrList;
            if ($EditParmValue1 == "*") {
                WriteErrorMessage ("C022");
            }
        }
    } elseif ($X == 2) {
        if ($Msg2AddrListAndSubjectSetByDropDown) {
            $EditParmName1 = "BoogieWoogiePizzaBoy19";
            $EditParmValue1 = "";
        } else {
            $EditParmName1   = "Msg2AddrList";
            $EditParmValue1  = $Msg2AddrList; 
            if ($EditParmValue1 == "*") {
                WriteErrorMessage ("C022");
            }
        }
    }
    
    if (!JSHEmpty($EditParmValue1)) {

        $EditParmValue1Mod = str_replace("|", ",", $EditParmValue1);
        $EditParmValue1Array = explode (",", $EditParmValue1Mod);

        $Count = count($EditParmValue1Array); 
        $Factor = 3;
        $Remainder = $Count % $Factor;

        if ($Remainder != 0) {
            $EditSubParmValue1  = $Count; 
            $EditSubParmValue2  = $Factor; 
            WriteErrorMessage("C016");
        }

        $Key0 = 0;
        while ($Key0 < $Count) {

            $Key1 = $Key0 + 1;
            $Key2 = $Key0 + 2;
            $EmailTest = trim($EditParmValue1Array[$Key1]) . "@" . trim($EditParmValue1Array[$Key2]);

            EditEmailAddress($EmailTest, $EditParmName1, $Key1, "C");
    
            $Key0 = $Key0 + 3;
        }
    }

    $X = $X + 1;
}

//-------------------------------------------------------------
//  End of $MsgxAddrList Edit
//-------------------------------------------------------------


//-------------------------------------------------------------
//  Begin MsgxDefaultFromAddr Edit
//-------------------------------------------------------------

$X = 1; 
while ($X < 3) {
    if ($X == 1) {
        $EditParmName1  = "Msg1DefaultFromAddr";
        $EditParmValue1 = $Msg1DefaultFromAddr;
    } elseif ($X == 2) {
        $EditParmName1  = "Msg2DefaultFromAddr";
        $EditParmValue1 = $Msg2DefaultFromAddr;
    }

    if ($EditParmValue1 == "*") {
        if ($X == 1) { 
            WriteErrorMessage ("C022");
        } elseif ($X == 2){
            $Msg2DefaultFromAddr = $Msg1DefaultFromAddr; 
        }
        
    } elseif (!JSHEmpty($EditParmValue1)) {

        $EditParmValue1Mod = str_replace("|", ",", $EditParmValue1);
        $EditParmValue1Array = explode (",", $EditParmValue1Mod);

        $Count = count($EditParmValue1Array); 
//        $Factor = 3;
//        $Remainder = $Count % $Factor;

        if ($Count != 3) {
            $EditSubParmValue1  = $Count; 
            $EditSubParmValue2  = 3; 
            WriteErrorMessage("C015");
        }

        $EmailTest = trim($EditParmValue1Array[1]) . "@" . trim($EditParmValue1Array[2]);

        EditEmailAddress($EmailTest, $EditParmName1, 1, "C");

    }

    $X = $X + 1;
}

//-------------------------------------------------------------
//  End of $MsgxDefaultFromAddr Edit
//-------------------------------------------------------------


//-------------------------------------------------------------
//  Begin MsgxFieldLabelValueSeparator Edit
//-------------------------------------------------------------

if ($Msg1FieldLabelValueSeparator == "*") {
    $EditParmName1 == "Msg1FieldLabelValueSeparator"; 
    WriteErrorMessage ("C022");
}

//-------------------------------------------------------------
//  End of $MsgxDefaultFromAddr Edit
//-------------------------------------------------------------


//-------------------------------------------------------------
//  Begin MsgxFieldNameExcludeList Edit
//-------------------------------------------------------------

$Msg1FieldNameExcludeListArray = array();
$Msg2FieldNameExcludeListArray = array();
$MsgEchoFieldNameExcludeListArray = array();

$X = 1; 
while ($X < 4) {
    if ($X == 1) {
        $EditParmName1  = "Msg1FieldNameExcludeList";
        $EditParmValue1 = $Msg1FieldNameExcludeList;
    } elseif ($X == 2) {
        $EditParmName1  = "Msg2FieldNameExcludeList";
        $EditParmValue1 = $Msg2FieldNameExcludeList;
    } elseif ($X == 3) {
        $EditParmName1  = "MsgEchoFieldNameExcludeList";
        $EditParmValue1 = $MsgEchoFieldNameExcludeList;
    }

    if ($EditParmValue1 == "*") {
        if ($X == 1) { 
            WriteErrorMessage ("C022");
        } elseif ($X == 2){
            $Msg2FieldNameExcludeListArray = $DefaultParmValue1Array; 
        } elseif ($X == 3){
            $MsgEchoFieldNameExcludeListArray = $DefaultParmValue1Array; 
        }

    } elseif (!JSHEmpty($EditParmValue1)) {

        $EditParmValue1Mod = str_replace("|", ",", $EditParmValue1);
        $EditParmValue1Array = explode (",", $EditParmValue1Mod);

        $Count = count($EditParmValue1Array); 

        $Key0 = 0;
        while ($Key0 < $Count) {
            $EditFieldName1 = trim($EditParmValue1Array[$Key0]);
            if (!array_key_exists ($EditFieldName1, $_POST) and 
                    $EditFieldName1 != "scriptversion" and
                    $EditFieldName1 != "phpversion" and
                    $EditFieldName1 != "scriptstarttime" and
                    $EditFieldName1 != "scriptpathshort" and
                    $EditFieldName1 != "scriptpathlong" and
                    $EditFieldName1 != "ip" and
                    $EditFieldName1 != "browser" and
                    $EditFieldName1 != "referer" and
                    $EditFieldName1 != "referrer")
                    {
                $EditFieldPos1 = $Key0 + 1;
                WriteErrorMessage("C002");
            }
                         
            $Key0 = $Key0 + 1;
        }
        
        if ($X == 1) {
            $Msg1FieldNameExcludeListArray = $EditParmValue1Array;
        } elseif ($X == 2) {
            $Msg2FieldNameExcludeListArray = $EditParmValue1Array;
        } elseif ($X == 3) {
            $MsgEchoFieldNameExcludeListArray = $EditParmValue1Array;
        }

        $DefaultParmValue1Array = $EditParmValue1Array;
    }

    $X = $X + 1;
}

//-------------------------------------------------------------
//  End of $MsgxFieldNameExcludeList Edit
//-------------------------------------------------------------


//-------------------------------------------------------------
//  Begin MsgxFieldNameLabelList Edit
//-------------------------------------------------------------

$Msg1FieldNameLabelListArray = array();
$Msg2FieldNameLabelListArray = array();
$MsgEchoFieldNameLabelListArray = array();

$NewArray = array();

$X = 1;
while ($X < 4) {
    if ($X == 1) {
        $EditParmName1  = "Msg1FieldNameLabelList";
        $EditParmValue1 = $Msg1FieldNameLabelList;
    } elseif ($X == 2) {
        $EditParmName1  = "Msg2FieldNameLabelList";
        $EditParmValue1 = $Msg2FieldNameLabelList;
    } elseif ($X == 3) {
        $EditParmName1  = "MsgEchoFieldNameLabelList";
        $EditParmValue1 = $MsgEchoFieldNameLabelList;
    }

    if ($EditParmValue1 == "*") {
        if ($X == 1) { 
            WriteErrorMessage ("C022");
        } elseif ($X == 2){
            $Msg2FieldNameLabelListArray = $DefaultParmValue1Array; 
        } elseif ($X == 3){
            $MsgEcho2FieldNameLabelListArray = $DefaultParmValue1Array; 
        }

    } elseif (!JSHEmpty($EditParmValue1)) {

        $EditParmValue1Mod = str_replace("|", ",", $EditParmValue1);
        $EditParmValue1Array = explode (",", $EditParmValue1Mod);

        $Count = count($EditParmValue1Array);
        $FormatInd = strtolower(trim($EditParmValue1Array[0]));

        if ($FormatInd == "format 3" or $FormatInd == "format3" or
                $FormatInd == "format 2" or $FormatInd == "format2") {
            $Key0 = 1;
            while ($Key0 < $Count) {
                $EditFieldName1 = trim($EditParmValue1Array[$Key0]);
                if (!array_key_exists ($EditFieldName1, $_POST) and
                        $EditFieldName1 != "blank" and
                        $EditFieldName1 != "newline" and
                        //  allow cond-newline even for format2 
                        $EditFieldName1 != "cond-newline" and
                        $EditFieldName1 != "scriptversion" and
                        $EditFieldName1 != "phpversion" and
                        $EditFieldName1 != "scriptstarttime" and
                        $EditFieldName1 != "scriptpathshort" and
                        $EditFieldName1 != "scriptpathlong" and
                        $EditFieldName1 != "ip" and
                        $EditFieldName1 != "browser" and
                        $EditFieldName1 != "referer" and
                        $EditFieldName1 != "referrer")
                        {
                    $EditFieldPos1 = $Key0 + 1;
                    WriteErrorMessage("C002");
                }
                $Key0 = $Key0 + 1;
            }
        } else {
            if ($FormatInd == "format 1" or $FormatInd == "format1") {
                $Key0 = 1;
            } else {
                $Key0 = 0;
            }

            while ($Key0 < $Count) {
                $EditFieldName1 = trim($EditParmValue1Array[$Key0]);
                if (!array_key_exists ($EditFieldName1, $_POST) and
                        strtolower(trim($EditParmValue1Array[$Key0+1])) != "blank" and
                        strtolower(trim($EditParmValue1Array[$Key0+1])) != "newline" and
                        $EditFieldName1 != "scriptversion" and
                        $EditFieldName1 != "phpversion" and
                        $EditFieldName1 != "scriptstarttime" and
                        $EditFieldName1 != "scriptpathshort" and
                        $EditFieldName1 != "scriptpathlong" and
                        $EditFieldName1 != "ip" and
                        $EditFieldName1 != "browser" and
                        $EditFieldName1 != "referer" and
                        $EditFieldName1 != "referrer")
                        {
                    $EditFieldPos1 = $Key0 + 1;
                    WriteErrorMessage("C002");
                }
                $Key0 = $Key0 + 2;
            }
        }
        
        if ($X == 1) {
            $Msg1FieldNameLabelListArray = $EditParmValue1Array;
        } elseif ($X == 2) {
            $Msg2FieldNameLabelListArray = $EditParmValue1Array;
        } elseif ($X == 3) {
            $MsgEchoFieldNameLabelListArray = $EditParmValue1Array;
        }

        $DefaultParmValue1Array = $EditParmValue1Array; 
    }

    $X = $X + 1;
}

//-------------------------------------------------------------
//  End of $MsgxFieldNameLabelList Edit
//-------------------------------------------------------------


//-------------------------------------------------------------
//  MsgXFieldNameValueSubstitutionList Edit 
//-------------------------------------------------------------

$DefaultSubstitutionArray = array();

$X = 1;

while ($X < 4) {
    if ($X == 1) {
        $EditParmName1  = "Msg1FieldNameValueSubstitutionList";
        $EditParmValue1 = $Msg1FieldNameValueSubstitutionList;
    } elseif ($X == 2) {
        $EditParmName1  = "Msg2FieldNameValueSubstitutionList";
        $EditParmValue1 = $Msg2FieldNameValueSubstitutionList;
    } elseif ($X == 3) {
        $EditParmName1  = "MsgEchoFieldNameValueSubstitutionList";
        $EditParmValue1 = $MsgEchoFieldNameValueSubstitutionList;
    }

    if ($EditParmValue1 == "*") {
        if ($X == 1) {
            WriteErrorMessage ("C022");
        } elseif ($X == 2) {
            $Msg2FieldNameValueSubstitutionArray    = $DefaultSubstitutionArray;
        } elseif ($X == 3) {
            $MsgEchoFieldNameValueSubstitutionArray = $DefaultSubstitutionArray;
        }


    } elseif (!JSHEmpty($EditParmValue1)) {

        $EditParmValue1Mod = str_replace("|", ",", $EditParmValue1);
        $EditParmValue1Array = explode (",", $EditParmValue1Mod);

        $Count = count($EditParmValue1Array);
        $Factor = 3;
        $Remainder = $Count % $Factor;

        if ($Remainder != 0) {
            $EditSubParmValue1  = $Count;
            $EditSubParmValue2  = $Factor;
            WriteErrorMessage("C016"); 
        }

        $SubstitutionArray = array();

        $Key0 = 0;
        while ($Key0 < $Count) {
            $EditFieldName1 = trim($EditParmValue1Array[$Key0]);
            $Key1           = $Key0 + 1;
            $CheckValue     = trim($EditParmValue1Array[$Key1]);
            $CheckValue     = str_replace("~", ",", $CheckValue);


            if (!array_key_exists ($EditFieldName1, $_POST)) {
                if ($CheckValue != "ON" and $CheckValue != "on" and $CheckValue != "OFF" and $CheckValue != "off") {
                    $EditFieldPos1  = $Key1;
                    WriteErrorMessage("C001");
                }
            }

            $Key2 = $Key0 + 2;
            $KeyValue = "$EditFieldName1+$CheckValue";
            $SubValue = trim($EditParmValue1Array[$Key2]);
            $SubValue = str_replace("~", ",", $SubValue);

            $SubstitutionArray[$KeyValue] = $SubValue;

            $Key0 = $Key0 + 3;
        }

        if ($X == 1) {
            $Msg1FieldNameValueSubstitutionArray    = $SubstitutionArray;
       } elseif ($X == 2) {
            $Msg2FieldNameValueSubstitutionArray    = $SubstitutionArray;
        } elseif ($X == 3) {
            $MsgEchoFieldNameValueSubstitutionArray = $SubstitutionArray;
        }

        $DefaultSubstitutionArray = $SubstitutionArray;

    }

    $X = $X + 1;
}

//-------------------------------------------------------------
//  End of MsgxFieldNameValueSubstitutionList Edit
//-------------------------------------------------------------


//-------------------------------------------------------------
//  MsgXFieldNameValueSubstitutionList2 Edit
//-------------------------------------------------------------

$DefaultSubstitutionArray = array();

$X = 1;

while ($X < 4) {
    if ($X == 1) {
        $EditParmName1  = "Msg1FieldNameValueSubstitutionList2";
        $EditParmValue1 = $Msg1FieldNameValueSubstitutionList2;
    } elseif ($X == 2) {
        $EditParmName1  = "Msg2FieldNameValueSubstitutionList2";
        $EditParmValue1 = $Msg2FieldNameValueSubstitutionList2;
    } elseif ($X == 3) {
        $EditParmName1  = "MsgEchoFieldNameValueSubstitutionList2";
        $EditParmValue1 = $MsgEchoFieldNameValueSubstitutionList2;
    }

    if ($EditParmValue1 == "*") {
        if ($X == 1) {
            WriteErrorMessage ("C022");
        } elseif ($X == 2) {
            $Msg2FieldNameValueSubstitutionArray    = $DefaultSubstitutionArray;
        } elseif ($X == 3) {
            $MsgEchoFieldNameValueSubstitutionArray = $DefaultSubstitutionArray;
        }


    } elseif (!JSHEmpty($EditParmValue1)) {

        $EditParmValue1Mod = str_replace("|", ",", $EditParmValue1);
        $EditParmValue1Array = explode (",", $EditParmValue1Mod);

        $Count = count($EditParmValue1Array);

        if (trim($FormFieldNameEditListArray[$Count - 1]) != "~") {
            WriteErrorMessage("C012");
        }

        $Factor = 2;
        $Remainder = $Count % $Factor;

        if ($Remainder != 0) {
            $EditSubParmValue1  = $Count;
            $EditSubParmValue2  = $Factor;
            WriteErrorMessage("C016");
        }

        $SubstitutionArray = array();

        $Key0 = 0;
        while ($Key0 < $Count) {
            $EditFieldName1 = trim($EditParmValue1Array[$Key0]);
            
            $Key1           = $Key0 + 1;
            
            while (trim($EditParmValue1Array[$Key1]) <> "~") {

                $CheckValue     = trim($EditParmValue1Array[$Key1]);
                $CheckValue     = str_replace("~", ",", $CheckValue);

                if (!array_key_exists ($EditFieldName1, $_POST)) {
                    if ($CheckValue != "ON" and $CheckValue != "on" and $CheckValue != "OFF" and $CheckValue != "off") {
                        $EditFieldPos1  = $Key1;
                        WriteErrorMessage("C001");
                    }
                }

                $Key2 = $Key1 + 1;
                $KeyValue = "$EditFieldName1+$CheckValue";
                $SubValue = trim($EditParmValue1Array[$Key2]);
                $SubValue = str_replace("~", ",", $SubValue);

                $SubstitutionArray[$KeyValue] = $SubValue;
                
                $Key1 = $Key1 + 2;

            }

            $Key0 = $Key1 + 1;
        }

        if ($X == 1) {
            $Msg1FieldNameValueSubstitutionArray2    = $SubstitutionArray;
        } elseif ($X == 2) {
            $Msg2FieldNameValueSubstitutionArray2    = $SubstitutionArray;
        } elseif ($X == 3) {
            $MsgEchoFieldNameValueSubstitutionArray2 = $SubstitutionArray;
        }

        $DefaultSubstitutionArray = $SubstitutionArray;

    }

    $X = $X + 1;
}

//-------------------------------------------------------------
//  End of MsgxFieldNameValueSubstitutionList Edit
//-------------------------------------------------------------


//-------------------------------------------------------------
//  Begin MsgxForcEDefaultFromAddr Edit
//-------------------------------------------------------------

$X = 1; 
while ($X < 3) {
    if ($X == 1) {
       NormalizeParmYN($Msg1ForcEDefaultFromAddr, "Msg1ForcEDefaultFromAddr", "no", TRUE, $Ignore);
    } elseif ($X == 2) {
        NormalizeParmYN($Msg2ForcEDefaultFromAddr, "Msg2ForcEDefaultFromAddr", "no", TRUE, $Ignore);
    }

    $X = $X + 1;
}

//-------------------------------------------------------------
//  End of $MsgxForcEDefaultFromAddr Edit
//-------------------------------------------------------------


//-------------------------------------------------------------
//  Begin $MsgxSubject Edit
//-------------------------------------------------------------

if ($Msg1Subject == "*") {
    $EditParmName1 == "Msg1Subject"; 
    WriteErrorMessage ("C022");
}

//-------------------------------------------------------------
//  End of $MsgxSubject Edit
//-------------------------------------------------------------


//-------------------------------------------------------------
//  Begin $MsgxSubjectField Edit
//-------------------------------------------------------------

$X = 1;
 
while ($X < 3) {
    if ($X == 1) {
        $EditParmName1  = "Msg1SubjectField"; 
        $EditParmValue1 = $Msg1SubjectField; 
    } elseif ($X == 2) {
        $EditParmName1  = "Msg2SubjectField"; 
        $EditParmValue1 = $Msg2SubjectField; 
    }

    if ($EditParmValue1 == "*") {
        if ($X == 1) { 
            WriteErrorMessage ("C022");
        } elseif ($X == 2){
            $Msg2SubjectField = $Msg1SubjectField; 
        }

    } elseif (!JSHEmpty($EditParmValue1) and !array_key_exists ($EditParmValue1, $_POST)) {
        $EditFieldPos1 = 1;
        $EditFieldName1 = $EditParmValue1; 
        WriteErrorMessage("C001");
    }

    $X = $X + 1;
}

//-------------------------------------------------------------
//  End of $MsgxSubjectField Edit
//-------------------------------------------------------------


//-------------------------------------------------------------
//  Begin $MsgxTextBottom Edit
//-------------------------------------------------------------

$X = 1;
 
while ($X < 4) {
    if ($X == 1) {
        $EditParmName1  = "Msg1TextBottom"; 
        $EditParmValue1 = $Msg1TextBottom; 
    } elseif ($X == 2) {
        $EditParmName1  = "Msg2TextBottom";
        $EditParmValue1 = $Msg2TextBottom; 
    } elseif ($X == 2) {
        $EditParmName1  = "MsgEchoTextBottom"; 
        $EditParmValue1 = $MsgEchoTextBottom; 
    }

    if ($EditParmValue1 == "*") {
        if ($X == 1) { 
            WriteErrorMessage ("C022");
        } elseif ($X == 2){
            $Msg2TextBottom = $DefaultTextBottom; 
        } elseif ($X == 3){
            $MsgEchoTextBottom = $DefaultTextBottom;
        }

    } else {
        $DefaultTextBottom = $EditParmValue1;
    }

    $X = $X + 1;
}

//-------------------------------------------------------------
//  End of $MsgxTextBottom Edit
//-------------------------------------------------------------


//-------------------------------------------------------------
//  Begin $MsgxTextTop Edit
//-------------------------------------------------------------

$X = 1;
 
while ($X < 4) {
    if ($X == 1) {
        $EditParmName1  = "Msg1TextTop"; 
        $EditParmValue1 = $Msg1TextTop; 
    } elseif ($X == 2) {
        $EditParmName1  = "Msg2TextTop"; 
        $EditParmValue1 = $Msg2TextTop; 
    } elseif ($X == 2) {
        $EditParmName1  = "MsgEchoTextTop"; 
        $EditParmValue1 = $MsgEchoTextTop; 
    }

    if ($EditParmValue1 == "*") {
        if ($X == 1) { 
            WriteErrorMessage ("C022");
        } elseif ($X == 2){
            $Msg2TextTop = $DefaultTextTop; 
        } elseif ($X == 3){
            $MsgEchoTextTop = $DefaultTextTop; 
        }

    } else {
        $DefaultTextTop = $EditParmValue1;
    }

    $X = $X + 1;
}

//-------------------------------------------------------------
//  End of $MsgxTextTop Edit
//-------------------------------------------------------------


//-------------------------------------------------------------
//  Begin SOMETHING Edit
//-------------------------------------------------------------

//-------------------------------------------------------------
//  End of SOMETHING Edit
//-------------------------------------------------------------

}  //  End of EditMessageLevelParameters ()

// *
//  *
//   *
//    *
//     *
//      *
//       *
//        *
//         *
//          *
//           *
//            *
//             *
//              *
//               *
//                *
//                 *
//                  *
//                   *
//                    *
//                     *
//                      *
//                       *
//                        *
//                         *
//                          *
//                           *
//                            *
//                             *
//                              *
//                               *
//                                *
//                               *
//                              *
//                             *
//                            *
//                           *
//                          *
//                         *
//                        *
//                       *
//                      *
//                     *
//                    *
//                   *
//                  *
//                 *
//                *
//               *
//              *
//             *
//            *
//           *
//          *
//         *
//        *
//       *
//      *
//     *
//    *
//   *
//  *
// *

//*************************************************************
//  START MAIN CODE
//*************************************************************

//  Set Error reporting to report Everything EXCEPT Notices and 
//  Deprecated messages; E_DEPRECATED introduced in 5.3.0)
//  change dated 20101113 
//  advised of need of change by kenrose1@optusnet.com.au

error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
 
//  Create initial variables

CreateInitialVariables();

//  Load and Create Form Level Parameters

CreateFormLevelParameters();
LoadFormLevelParameters();

CreateMsgLevelParameters ();
LoadMsgLevelParameters ();

//  if $FormOutputFieldInfo is set to yes, then do it

NormalizeParmYN($FormOutputFieldInfo, "FormOutputFieldInfo", "no", TRUE, $Ignore);

if ($FormOutputFieldInfo == "yes") { 
    OutputFieldInfo ();
}

//  Perform the initial configuration edits

EditFormLevelParameters ();

//  Load critical arrays

ProcessFormFieldNameLabelPlusList();

EditMessageLevelParameters ();


//-------------------------------------------------------------
//  Check input fields for errors
//-------------------------------------------------------------

EditFormUserInput();

if ($ErrorsWritten) {
    WriteEndOfErrorPage("");
    exit;
}    


//-------------------------------------------------------------
//  Write/Update the CSV Output File
//-------------------------------------------------------------

WriteFile(); 


//-------------------------------------------------------------
//  Process Message 1 (Msg1)
//
//  The prefix of Msg0 is used to indicate variables which
//  contain values extracted from Msg1, Msg2 and MsgEcho
//-------------------------------------------------------------

$MsgNumber                          = "1";

if ($Msg1AddrListAndSubjectSetByDropDown) {
    $Msg1AddrList                   = $HoldMsg1AddrList;
}

$Msg0AddrList                   = $Msg1AddrList;

$Msg0DefaultFromAddr            = $Msg1DefaultFromAddr;
$Msg0FieldLabelValueSeparator   = $Msg1FieldLabelValueSeparator;

$Msg0FieldNameExcludeListArray  = $Msg1FieldNameExcludeListArray;

$Msg0FieldNameLabelListArray    = $Msg1FieldNameLabelListArray;

if (JSHEmpty($Msg0FieldNameLabelList)) {
    $Msg0FieldNameLabelListArray = $FormFieldNameLabelListArray;
}

$Msg0FieldNameValueSubstitutionArray = $Msg1FieldNameValueSubstitutionArray;

$Msg0ForcEDefaultFromAddr        = $Msg1ForcEDefaultFromAddr;

$Msg0SubjectField      = $Msg1SubjectField;
$Msg0SubjectFieldValue = trim(stripslashes(strip_tags($_POST[$Msg0SubjectField])));
$Msg0Subject           = "";

if (!JSHEmpty($Msg0SubjectFieldValue)) {
    $Msg0Subject        = $Msg0SubjectFieldValue;
} elseif ($Msg1AddrListAndSubjectSetByDropDown) {
    $Msg0Subject       = $HoldMsg1Subject;
} else {
    $Msg0Subject       = $Msg1Subject;
}

$Msg0SubjectDefault = $Msg0Subject;

$Msg0TextBottom                     = $Msg1TextBottom;

if ($Msg0TextBottom == "*") {
    $Msg0TextBottom = $Msg0TextBottomDefault;
}
$Msg0TextBottomDefault = $Msg0TextBottom;

$Msg0TextTop                        = $Msg1TextTop;

if ($Msg0TextTop == "*") {
    $Msg0TextTop = $Msg0TextTopDefault;
}
$Msg0TextTopDefault = $Msg0TextTop;

if (!JSHEmpty($Msg0AddrList) ) {
    AssembleMessage();
    DoTheSending ();
}


//-------------------------------------------------------------
//  Process Message 2 (Msg2)
//
//  The prefix of Msg0 is used to indicate variables which
//  contain values extracted from Msg1, Msg2 and MsgEcho
//-------------------------------------------------------------

if ($Msg2AddrListAndSubjectSetByDropDown) {
    $Msg2AddrList                   = $HoldMsg2AddrList;
}

$Msg0AddrList                   = $Msg2AddrList;

if (! JSHEmpty($Msg0AddrList)) {
    $MsgNumber = "2";

    $Msg0DefaultFromAddr             = $Msg2DefaultFromAddr;

    $Msg0FieldLabelValueSeparator    = $Msg2FieldLabelValueSeparator;

    $Msg0FieldNameExcludeListArray   = $Msg2FieldNameExcludeListArray;
    $Msg0FieldNameLabelListArray     = $Msg2FieldNameLabelListArray;

    if (JSHEmpty($Msg0FieldNameLabelList)) {
        $Msg0FieldNameLabelListArray = $FormFieldNameLabelListArray;
    }

    $Msg0FieldNameValueSubstitutionArray = $Msg2FieldNameValueSubstitutionArray;

    $Msg0ForcEDefaultFromAddr           = $Msg2ForcEDefaultFromAddr;
    
    $Msg0SubjectField      = $Msg2SubjectField;
    $Msg0SubjectFieldValue = trim(stripslashes(strip_tags($_POST[$Msg0SubjectField])));
    $Msg0Subject           = "";

    if (!JSHEmpty($Msg0SubjectFieldValue)) {
        $Msg0Subject                    = $Msg0SubjectFieldValue;
    } elseif ($Msg2AddrListAndSubjectSetByDropDown) {
        $Msg0Subject                    = $HoldMsg2Subject;
    } else {
        $Msg0Subject                    = $Msg2Subject;
    }

    if ($Msg0Subject == "*") {
        $Msg0Subject = $Msg0SubjectDefault;
    }

    $Msg0SubjectDefault = $Msg0Subject;

    $Msg0TextBottom                     = $Msg2TextBottom;

    if ($Msg0TextBottom == "*") {
        $Msg0TextBottom = $Msg0TextBottomDefault;
    }
    $Msg0TextBottomDefault = $Msg0TextBottom;

    $Msg0TextTop                        = $Msg2TextTop;

    if ($Msg0TextTop == "*") {
        $Msg0TextTop = $Msg0TextTopDefault;
    }
    $Msg0TextTopDefault = $Msg0TextTop;

    if (!JSHEmpty($Msg0AddrList) ) {
        AssembleMessage();
        DoTheSending ();
    }

}


//-------------------------------------------------------------
//  Send the "Echo" Message (MsgEcho)
//
//  The prefix of Msg0 is used to indicate variables which
//  contain values extracted from Msg1, Msg2 and MsgEcho
//-------------------------------------------------------------

//  Check to see if an echo message is requested and possible

if (strtolower($FormEchoUser) == "yes" and ! JSHEmpty($FormEmail)) {

    $MsgNumber = "E";

    $Msg0AddrList                       = "FORCE ECHO TO PROCESS";
//  $Msg0DefaultFromAddr                = "";

    $Msg0FieldLabelValueSeparator       = $MsgEchoFieldLabelValueSeparator;

    $Msg0FieldNameExcludeListArray           = $MsgEchoFieldNameExcludeListArray;

    $Msg0FieldNameLabelListArray             = $MsgEchoFieldNameLabelListArray;

    if (JSHEmpty($Msg0FieldNameLabelList)) {
        $Msg0FieldNameLabelListArray        = $FormFieldNameLabelListArray;
    }

    $Msg0FieldNameValueSubstitutionArray = $MsgEchoFieldNameValueSubstitutionArray;

    $Msg0Subject                        = $MsgEchoSubject;

    if ($Msg0Subject == "*") {
        $Msg0Subject = $Msg0SubjectDefault;
    }

    $Msg0TextBottom                     = $MsgEchoTextBottom;

    if ($Msg0TextBottom == "*") {
        $Msg0TextBottom = $Msg0TextBottomDefault;
    }
    $Msg0TextBottomDefault = $Msg0TextBottom;

    $Msg0TextTop                        = $MsgEchoTextTop;

    if ($Msg0TextTop == "*") {
        $Msg0TextTop = $Msg0TextTopDefault;
    }
    $Msg0TextTopDefault = $Msg0TextTop;

    //  Format the addressee for the copy email and strip any
    //  embedded commas. Commas can occur in a name 
    //  (e.g., Bob Jones, III). Testing shows that such
    //  commas cause problems. Until I figure out if they 
    //  can be handled properly I just remove them. 

    if (JSHEmpty($FormName)) {
        $Addressee = $FormEmail;
    } else {
        if ($FormPleaseForgiveMyUseOfAWindowsServer == "yes") {
            $Addressee = "$FormEmail"; 
        } else {    
            $Addressee = "\"$FormName\" <$FormEmail>"; 
        }    
    }

    $MsgEchoAddressee = str_replace(",", "", $Addressee);
    
    if (JSHEmpty($MsgEchoFromAddr)) {
        $MsgEchoFromAddr = $Msg1AddrList;
    }

    if (!JSHEmpty($Msg0AddrList) ) {
        AssembleMessage();
        DoTheSending ();
    }

}


//-------------------------------------------------------------
//  "Go to" the page indicated by $FormNextURL 
//-------------------------------------------------------------

header("Location: $FormNextURL");
exit;



?>
