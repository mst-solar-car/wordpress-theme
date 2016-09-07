###################################
#      Post-Commit Script         #
#      By Michael Rouse           #
#                                 #
#    Marks an old theme build     #
#          as expired             #
###################################
.\build-settings.ps1 # Import settings



if ($BuildAfterCommit -eq $true) 
{
    # Run the build script
    .\build.ps1
}
elseif ($MarkOldBuildsAsExpired -eq $true) 
{
    # Begin Customizable Variables 
    
        # Set this to true to build

        # Regular Expressions 
        $namePattern = "(?:T|t)heme (?:N|n)ame: " # Used to read the theme name from style.css
        $versionPattern = "(?:v|V)ersion: "  # Used to read version number from style.css

    # End Customizable Variables
    clear

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




    $zipFileName = ($theme -replace "\s", "")

    $outFile = "$PSScriptRoot\$zipFileName.zip" # Full path to the zip output file

    $newFileName = "$PSSCriptRoot\$zipFileName (expired).zip"


    # Rename the zip file to mark it as expired
    if (Test-Path $outFile)
    {
        Rename-Item $outFile $newFileName
    }
}