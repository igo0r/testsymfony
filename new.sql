ALTER TABLE ReadersRelations ADD FOREIGN KEY (book) REFERENCES Books(id);
ALTER TABLE ReadersRelations ADD FOREIGN KEY (reader) REFERENCES Readers(id);