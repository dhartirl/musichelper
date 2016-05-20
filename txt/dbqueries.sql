
/* All scales in all keys */
select concat(r.name, ' ', s.name), group_concat(n.name order by sii.index separator ' ')
    from scale_interval_index sii
    inner join scale s on s.id = sii.scale
    inner join intervals i on i.length = sii.interval
    inner join note r
    inner join note n on n.id = mod(r.id + i.length, 12)
    group by r.id, s.id;
