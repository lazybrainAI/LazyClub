<?php
echo \Carbon\Carbon::parse($event['date'])->format('d.m.Y')." ".\Carbon\Carbon::parse($event['time'])->format('H:i')?>