###################################
#   WordPress Theme Builder       #
#      By Michael Rouse           #
#                                 #
#  Zips up all files of a theme   #
###################################

# Begin Customizable Variables 
    # File Extensions to ignore when adding files to the .zip folder
    $extensionsToIgnore = @("*.ts", "*.less", "*.json", "*.gitignore", "*.zip", "*.ps1", "*.md")
    
    $foldersToIgnore = "\.(.*)(\\(.*)?)*"

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


Write-Host "Compiling $theme version $version WordPress Theme"




$zipFileName = ($theme -replace "\s", "")

$outFile = "$PSScriptRoot\$zipFileName.zip" # Full path to the zip output file

# Remove previous zipped themes if one exists
if (Test-Path $outFile)
{
    Remove-Item $outFile
}

# Create temp folder
$tempDir = "$PSScriptRoot\TempThemeFolderToZip"

# Must remove temp folder before getting a list of files, otherwise robocopy will just keep looping doing a millioin temp directories
if (Test-Path $tempDir) 
{
    Remove-Item $tempDir -Recurse
}



# Get all the files with proper file extensions  
$files = Get-ChildItem $PSScriptRoot -Recurse -Exclude $extensionsToIgnore | where { ! $_.PSIsContainer } # Get files without the pad file extensions

# Create the temp directory
New-Item $tempDir -Type directory -Force | Out-Null

$totalFiles = $files.Length; 
$progress = 0;

# Copy all files into the temp directory
Write-Progress -Activity "Copying Files" -Status "$progress% Complete:" -PercentComplete $progress;

$escapedRoot = $PSScriptRoot -replace "\\", "\\" # Escape backslashes in the file path (needed for use in regular expressions)

# This for-loop will copy all the files found that should be included and moves them into the temp directory
for ($i = 0; $i -lt $totalFiles; $i++) 
{
    $directoryName = $files[$i].DirectoryName
    $relativeDir = $directoryName -replace "$escapedRoot(\\)?", ""
    
    if ( !($relativeDir -match $foldersToIgnore) ) { 
        # Copy to temp folder and preserve structure
        robocopy "$directoryName" "$tempDir\$relativeDir" "$($files[$i].Name)" | Out-Null

        # Update Progress
        $progress = [System.Math]::Round(($i / $totalFiles) * 100, 2);
        Write-Progress -Activity "Copying Files" -Status "$progress% Complete:" -PercentComplete $progress;

        Start-Sleep -m 50 # Really short delay so it looks like it is doing more work ;)
    }
}



# Compress the entire temp folder into the zip folder
Compress-Archive -Path "$tempDir\*" -DestinationPath $outFile | Out-Null


# Remove the temp folder 
Remove-Item $tempDir -Recurse -Force | Out-Null


if ( !(Test-Path $outFile) ) 
{
    Write-Error "Could not create zip folder: $outFile"
}
else 
{
    # Show final output
    Write-Output ""
    Write-Output ""
    Write-Output "Success: $outFile"
}

if (Test-Path $tempDir) 
{
    Write-Error "Could Not remove the temporary directory: $tempDir"
}


