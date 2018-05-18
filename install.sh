#!/bin/bash
# Script Name: Event-Manager installer
# Author: PREngineer (Jorge Pabon) - pianistapr@hotmail.com
# Publisher: Jorge Pabon
# License: Personal Use (1 device) per payment
###########################################################

#-----------------------------------------------------------------------------

progress-bar() {
  local duration=${1}


    already_done() { for ((done=0; done<$elapsed; done++)); do printf "▇"; done }
    remaining() { for ((remain=$elapsed; remain<$duration; remain++)); do printf " "; done }
    percentage() { printf "| %s%%" $(( (($elapsed)*100)/($duration)*100/100 )); }
    clean_line() { printf "\r"; }

  for (( elapsed=1; elapsed<=$duration; elapsed++ )); do
      already_done; remaining; percentage
      sleep 1
      clean_line
  done
  clean_line
}

#-----------------------------------------------------------------------------

# Color definition variables
YELLOW='\e[33;3m'
RED='\e[91m'
BLACK='\033[0m'
CYAN='\e[96m'
GREEN='\e[92m'

# Display the Title Information
echo
echo -e $RED
echo -e "╔══════════════════════════════════════════════════════════════╗"
echo -e "║███████╗██████╗ ██████╗ ██╗███╗   ██╗████████╗███████╗██████╗ ║"
echo -e "║██╔════╝██╔══██╗██╔══██╗██║████╗  ██║╚══██╔══╝██╔════╝██╔══██╗║"
echo -e "║███████╗██████╔╝██████╔╝██║██╔██╗ ██║   ██║   █████╗  ██████╔╝║"
echo -e "║╚════██║██╔═══╝ ██╔══██╗██║██║╚██╗██║   ██║   ██╔══╝  ██╔══██╗║"
echo -e "║███████║██║     ██║  ██║██║██║ ╚████║   ██║   ███████╗██║  ██║║"
echo -e "║╚══════╝╚═╝     ╚═╝  ╚═╝╚═╝╚═╝  ╚═══╝   ╚═╝   ╚══════╝╚═╝  ╚═╝║"
echo -e "╚══════════════════════════════════════════════════════════════╝"
echo -e $CYAN"          ╔Brought to you by PREngineer (Jorge Pabón)╗     "
echo -e $CYAN"          ╚════https://www.github.com/PREngineer═════╝     "
echo
echo -e $GREEN'Installer'$BLACK

echo
echo -e $YELLOW"|--> Updating Ubuntu..."$BLACK
echo

sudo apt-get -y update &>/dev/null & progress-bar 10

echo
echo -e $YELLOW"|--> Upgrading Ubuntu packages..."$BLACK
echo

sudo apt-get -y upgrade &>/dev/null & progress-bar 10

exit 0
