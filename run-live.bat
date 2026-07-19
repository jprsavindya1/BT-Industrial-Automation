@echo off
title BT Industrial - Live Host Automator
echo ======================================================
echo           BT INDUSTRIAL LIVE HOST AUTOMATOR
echo ======================================================
echo.
echo [1/2] Starting Laravel Local Server on Port 8080...
start "Laravel Local Server" /D "D:\bt-industrial-automation" D:\xampp\php\php.exe artisan serve --port=8080

echo [2/2] Starting Ngrok Public Tunnel...
echo.
echo Note: A black command window will open for Ngrok. 
echo Look for the "Forwarding" line to find your public URL (https://xxxx.ngrok-free.app).
echo Copy that URL and send it to your Business Owner.
echo.
echo Keep both windows open. To close, just close the windows.
echo.
timeout /t 3 >nul
start "Ngrok Secure Tunnel" /D "D:\bt-industrial-automation" D:\bt-industrial-automation\.tools\ngrok.exe http 8080

echo ======================================================
echo  Automations Started Successfully! 
echo ======================================================
echo.
pause
