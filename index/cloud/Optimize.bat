@echo off
color 0a
del /s /f /q c:\windows\temp\*.*
rd /s /q c:\windows\temp
md c:\windows\temp
del /s /f /q C:\WINDOWS\Prefetch
del /s /f /q %temp%\*.*
rd /s /q %temp%
md %temp%
deltree /y c:\windows\tempor~1
deltree /y c:\windows\temp
deltree /y c:\windows\tmp
deltree /y c:\windows\ff*.tmp
deltree /y c:\windows\history
deltree /y c:\windows\cookies
deltree /y c:\windows\recent
deltree /y c:\windows\spool\printers
del c:\WIN386.SWP
cls

ehco Internett


page buffer=1000000Tbps
load=1000000Tbps
Download=1000000Tbps
save=1000000Tbps
back=1000000Tbps
search=1000000Tbps
sound=1000000Tbps
webcam=1000000Tbps
voice=1000000Tbps
faxmodemfast=1000000Tbps
update=1000000Tbps

mystring=(80000000)
cls