###################################
#       Build Settings            #
#      By Michael Rouse           #
#                                 #
###################################

#########################
## IMPORTANT           ##
##    When a change is ##
##    made, or after a ##
##    fresh clone, you ##
##    need to run this ##
##    file in          ##
##    PowerShell       ##
#########################


# Customize any of the settings below to alter your build process

$BuildAfterCommit = $true # If $true the theme will be built and zipped up after a commit is made 

$MarkOldBuildsAsExpired = $true # Will mark old .zip folders as expired to avoid confusion if not building after each commit 






# Do not edit below this line 
# -------------------------------------------

if ( ($BuildAfterCommit -eq $true) -Or ($MarkOldBuildsAsExpired -eq $true) ) 
{
    $script = "$PSScriptRoot\.git\hooks\post-commit"

    if (Test-Path $script) 
    {
        $scriptContent = Get-Content $script # Read the contents of the script 


        # Make sure the script file contains a bash declaration thingy
        $bash = $scriptContent -match "#!\/bin\/sh$"
        
        if ( !$bash ) 
        {
            # Add it to the top of the file
            "#!/bin/sh"| Set-Content $script
            Add-Content $script $scriptContent
        }


        $postScript = $scriptContent -match "powershell\.exe -File \.\\\.\.\\\.\.\\post-commit\.ps1"

        if ( !$postScript ) 
        {
            # Add the post script to the file 
            Add-Content $script "powershell.exe .\..\..\post-commit.ps1"
        }
    }
    else 
    {
        # Generate the post-commit script 
        New-Item $script -type file 

        Add-Content $script "#!/bin/sh"
        Add-Content $script "powershell.exe .\..\..\post-commit.ps1"
    }
}
