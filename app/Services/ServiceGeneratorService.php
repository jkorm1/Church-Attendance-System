<?php

namespace App\Services;

use Carbon\Carbon;

class ServiceGeneratorService
{
    /**
     * Get all available services for a given period.
     * Generates services for today and the next N days.
     */
    public function getAllServices($days = 14)
    {
        $services = [];
        $today = Carbon::now();

        for ($i = 0; $i < $days; $i++) {
            $date = $today->copy()->addDays($i);

            if ($date->isWednesday()) {
                $services[] = $this->createService('Wednesday Midweek Service', $date, 'auto_wednesday_');
            }

            if ($date->isFriday()) {
                $services[] = $this->createService('Friday All Night Service', $date, 'auto_friday_');
            }

            if ($date->isSunday()) {
                $services[] = $this->createService('Sunday 1st Service', $date, 'auto_sunday_1_', 1);
                $services[] = $this->createService('Sunday 2nd Service', $date, 'auto_sunday_2_', 2);
                $services[] = $this->createService('Sunday 3rd Service', $date, 'auto_sunday_3_', 3);
            }
        }
        
        // Remove duplicates based on ID, just in case
        $uniqueServices = [];
        foreach ($services as $service) {
            $uniqueServices[$service['id']] = $service;
        }
        
        return array_values($uniqueServices);
    }

    /**
     * Helper to create a service array.
     */
    private function createService($name, Carbon $date, $idPrefix, $serviceNumber = null)
    {
        return [
            'id' => $idPrefix . $date->format('Y-m-d'),
            'name' => $name,
            'service_date' => $date->format('Y-m-d'),
            'type' => 'Regular',
            'is_auto_generated' => true,
            'day_of_week' => $date->format('l'),
            'service_number' => $serviceNumber,
        ];
    }

    /**
     * Parse auto-generated service ID
     */
    public function parseServiceId($serviceId)
    {
        if (!str_starts_with($serviceId, 'auto_')) {
            return null;
        }

        $parts = explode('_', $serviceId);
        if (count($parts) < 3) return null;

        $type = $parts[1]; 
        $dateStr = end($parts);
        $date = Carbon::parse($dateStr);
        $name = '';
        $serviceNumber = null;

        switch ($type) {
            case 'sunday':
                $serviceNumber = $parts[2] ?? 1;
                $name = "Sunday " . ($serviceNumber == 1 ? '1st' : ($serviceNumber == 2 ? '2nd' : '3rd')) . " Service";
                break;
            case 'wednesday':
                $name = "Wednesday Midweek Service";
                break;
            case 'friday':
                $name = "Friday All Night Service";
                break;
        }
        
        return [
            'id' => $serviceId,
            'name' => $name,
            'service_date' => $date->format('Y-m-d'),
            'type' => 'Regular',
            'is_auto_generated' => true,
            'day_of_week' => ucfirst($type),
            'service_number' => $serviceNumber
        ];
    }

    /**
     * Get upcoming services (alias for getAllServices for compatibility)
     */
    public function getUpcomingServices($days = 14)
    {
        return $this->getAllServices($days);
    }

    /**
     * Get today's services only.
     */
    public function getTodayServices()
    {
        $today = \Carbon\Carbon::now();
        $services = [];
        if ($today->isWednesday()) {
            $services[] = $this->createService('Wednesday Midweek Service', $today, 'auto_wednesday_');
        }
        if ($today->isFriday()) {
            $services[] = $this->createService('Friday All Night Service', $today, 'auto_friday_');
        }
        if ($today->isSunday()) {
            $services[] = $this->createService('Sunday 1st Service', $today, 'auto_sunday_1_', 1);
            $services[] = $this->createService('Sunday 2nd Service', $today, 'auto_sunday_2_', 2);
            $services[] = $this->createService('Sunday 3rd Service', $today, 'auto_sunday_3_', 3);
        }
        return $services;
    }
} 