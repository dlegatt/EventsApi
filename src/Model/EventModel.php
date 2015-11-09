<?php

namespace App\Model;

class EventModel extends BaseModel
{
    public function findEvent($id)
    {
        $sql = 'SELECT id, name, date, time,location_id, image_url as imageUrl FROM event WHERE id = ?';
        $event = $this->db->fetchAssoc($sql, [$id]);
        $event['sessions'] = $this->findSessions($event['id']);
        $event['location'] = $this->findLocation($event['location_id']);
        return $event;
    }

    public function findAllEvents()
    {
        $sql = 'SELECT id from event';
        $ids = $this->db->fetchAll($sql);
        $events = [];
        foreach ($ids as $k => $v) {
            $events[] = $this->findEvent($v['id']);
        }
        return $events;
    }

    public function findSessions($eventId)
    {
        $sql = 'SELECT s.id, s.name,s.creatorName, s.abstract, s.upVoteCount, l.name as level, d.name as duration  FROM session s '.
            'JOIN duration d ON s.duration_id = d.id '.
            'JOIN level l ON s.level_id = l.id '.
            'WHERE s.event_id = ?';
        return $this->db->fetchAll($sql,[$eventId]);
    }

    public function findLocation($id)
    {
        $sql = 'SELECT address, city, province FROM location WHERE id = ?';
        return $this->db->fetchAssoc($sql,[$id]);
    }
}