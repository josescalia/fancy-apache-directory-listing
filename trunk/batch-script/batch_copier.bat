@echo off

rem loop throug directory and copy index.php
set WORKING_DIRECTORY=%cd%
for /R  %WORKING_DIRECTORY%  %%G in (.) do (
  pushd %%G
  echo copying index.php to %%G
  copy %WORKING_DIRECTORY%\index.php %%G
  rem echo now in %%G
  echo Done
  popd 
 )

