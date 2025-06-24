<?php

namespace App\Services;

use Carbon\Carbon;

class ServiceGeneratorService
{
    /**
     * Get upcoming services based on current date
     */
    public function getUpcomingServices()
    {
        $today = Carbon::now();
        $upcomingServices = [];

        // Get the next Wednesday service
        $nextWednesday = $today->copy()->next(Carbon::WEDNESDAY);
        if ($nextWednesday->isToday()) {
            $nextWednesday = $nextWednesday->addWeek();
        }
        
        $upcomingServices[] = [
            'id' => 'auto_wednesday_' . $nextWednesday->format('Y-m-d'),
            'name' => 'Wednesday Midweek Service',
            'service_date' => $nextWednesday->format('Y-m-d'),
            'type' => 'Regular',
            'is_auto_generated' => true,
            'day_of_week' => 'Wednesday'
        ];

        // Get the next Friday service
        $nextFriday = $today->copy()->next(Carbon::FRIDAY);
        if ($nextFriday->isToday()) {
            $nextFriday = $nextFriday->addWeek();
        }
        
        $upcomingServices[] = [
            'id' => 'auto_friday_' . $nextFriday->format('Y-m-d'),
            'name' => 'Friday All Night Service',
            'service_date' => $nextFriday->format('Y-m-d'),
            'type' => 'Regular',
            'is_auto_generated' => true,
            'day_of_week' => 'Friday'
        ];

        // Get the next Sunday services (1st, 2nd, 3rd)
        $nextSunday = $today->copy()->next(Carbon::SUNDAY);
        if ($nextSunday->isToday()) {
            $nextSunday = $nextSunday->addWeek();
        }
        
        $upcomingServices[] = [
            'id' => 'auto_sunday_1_' . $nextSunday->format('Y-m-d'),
            'name' => 'Sunday 1st Service',
            'service_date' => $nextSunday->format('Y-m-d'),
            'type' => 'Regular',
            'is_auto_generated' => true,
            'day_of_week' => 'Sunday',
            'service_number' => 1
        ];

        $upcomingServices[] = [
            'id' => 'auto_sunday_2_' . $nextSunday->format('Y-m-d'),
            'name' => 'Sunday 2nd Service',
            'service_date' => $nextSunday->format('Y-m-d'),
            'type' => 'Regular',
            'is_auto_generated' => true,
            'day_of_week' => 'Sunday',
            'service_number' => 2
        ];

        $upcomingServices[] = [
            'id' => 'auto_sunday_3_' . $nextSunday->format('Y-m-d'),
            'name' => 'Sunday 3rd Service',
            'service_date' => $nextSunday->format('Y-m-d'),
            'type' => 'Regular',
            'is_auto_generated' => true,
            'day_of_week' => 'Sunday',
            'service_number' => 3
        ];

        // Sort by date and time (Wednesday first, then Friday, then Sunday)
        usort($upcomingServices, function($a, $b) {
            $dateA = Carbon::parse($a['service_date']);
            $dateB = Carbon::parse($b['service_date']);
            
            if ($dateA->eq($dateB)) {
                // Same date, sort by service order
                $orderA = $this->getServiceOrder($a['day_of_week'], $a['service_number'] ?? 1);
                $orderB = $this->getServiceOrder($b['day_of_week'], $b['service_number'] ?? 1);
                return $orderA <=> $orderB;
            }
            
            return $dateA <=> $dateB;
        });

        return $upcomingServices;
    }

    /**
     * Get service order for sorting (Wednesday=1, Friday=2, Sunday=3)
     */
    private function getServiceOrder($dayOfWeek, $serviceNumber = 1)
    {
        switch ($dayOfWeek) {
            case 'Wednesday':
                return 1;
            case 'Friday':
                return 2;
            case 'Sunday':
                return 3 + $serviceNumber; // Sunday 1st=4, 2nd=5, 3rd=6
            default:
                return 999;
        }
    }

    /**
     * Get today's services if any
     */
    public function getTodayServices()
    {
        $today = Carbon::now();
        $todayServices = [];

        if ($today->isWednesday()) {
            $todayServices[] = [
                'id' => 'auto_wednesday_' . $today->format('Y-m-d'),
                'name' => 'Wednesday Midweek Service',
                'service_date' => $today->format('Y-m-d'),
                'type' => 'Regular',
                'is_auto_generated' => true,
                'day_of_week' => 'Wednesday'
            ];
        }

        if ($today->isFriday()) {
            $todayServices[] = [
                'id' => 'auto_friday_' . $today->format('Y-m-d'),
                'name' => 'Friday All Night Service',
                'service_date' => $today->format('Y-m-d'),
                'type' => 'Regular',
                'is_auto_generated' => true,
                'day_of_week' => 'Friday'
            ];
        }

        if ($today->isSunday()) {
            $todayServices[] = [
                'id' => 'auto_sunday_1_' . $today->format('Y-m-d'),
                'name' => 'Sunday 1st Service',
                'service_date' => $today->format('Y-m-d'),
                'type' => 'Regular',
                'is_auto_generated' => true,
                'day_of_week' => 'Sunday',
                'service_number' => 1
            ];

            $todayServices[] = [
                'id' => 'auto_sunday_2_' . $today->format('Y-m-d'),
                'name' => 'Sunday 2nd Service',
                'service_date' => $today->format('Y-m-d'),
                'type' => 'Regular',
                'is_auto_generated' => true,
                'day_of_week' => 'Sunday',
                'service_number' => 2
            ];

            $todayServices[] = [
                'id' => 'auto_sunday_3_' . $today->format('Y-m-d'),
                'name' => 'Sunday 3rd Service',
                'service_date' => $today->format('Y-m-d'),
                'type' => 'Regular',
                'is_auto_generated' => true,
                'day_of_week' => 'Sunday',
                'service_number' => 3
            ];
        }

        return $todayServices;
    }

    /**
     * Get all available services (today + upcoming + custom)
     */
    public function getAllServices()
    {
        $todayServices = $this->getTodayServices();
        $upcomingServices = $this->getUpcomingServices();
        
        // Combine and remove duplicates
        $allServices = array_merge($todayServices, $upcomingServices);
        
        // Remove duplicates based on ID
        $uniqueServices = [];
        foreach ($allServices as $service) {
            $uniqueServices[$service['id']] = $service;
        }
        
        return array_values($uniqueServices);
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
        if (count($parts) >= 3) {
            $type = $parts[1]; // sunday, wednesday, friday
            $serviceNumber = $parts[2] ?? null; // 1, 2, 3 for sunday services
            $date = $parts[3] ?? null;
            
            $name = '';
            switch ($type) {
                case 'sunday':
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
                'service_date' => $date,
                'type' => 'Regular',
                'is_auto_generated' => true,
                'day_of_week' => ucfirst($type),
                'service_number' => $serviceNumber
            ];
        }
        
        return null;
    }
} 