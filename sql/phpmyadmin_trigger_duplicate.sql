CREATE TRIGGER `duplicate_form_entries` AFTER INSERT ON `wpek_wpforms_tasks_meta`
 FOR EACH ROW begin
  insert into wpek_wpforms_tasks_meta_custom(id,action,data,`date`) values (NEW.id,NEW.action,NEW.data,NEW.date);
end
