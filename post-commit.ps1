###################################
#   WordPress Theme Builder       #
#      By Michael Rouse           #
#                                 #
#    Marks an old theme build     #
#          as expired             #
###################################




# Get the proper version number and theme name from the CSS File 
$cssFile = "$PSScriptRoot\style.css"

# Make sure the css file exists
if (!(Test-Path $cssFile))
{
    Write-Error "The style.css File was not found, cannot proceed."
    exit 5
}

$cssContent = Get-Content $cssFile

# Get theme name
$themeTitle = $cssContent -match "$namePattern(.*?)$"
$theme = $themeTitle -replace "$namepattern", ""

# Get theme version number
$versionTitle =  $cssContent -match "$versionPattern([0-9]+.[0-9]+)$"
$version = $versionTitle -replace "$versionPattern", ""


Write-Host "Compiling $theme version $version WordPress Theme"




$zipFileName = ($theme -replace "\s", "")

$outFile = "$PSScriptRoot\$zipFileName.zip" # Full path to the zip output file

$newFileName = "$PSSCriptRoot\$zipFileName (expired).zip"


# Rename the zip file to mark it as expired
if (Test-Path $outFile)
{
    Rename-Item $outFile $newFileName
}